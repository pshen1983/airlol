<?php
class DAO_Cacher {
    private static $m_instance = null;
    private $memcache = null;

    public static function instance() {
        if (self::$m_instance==null) {
            self::$m_instance = new DAO_Cacher();
        }

        return self::$m_instance;
    }

    private function __construct() {
        if (External_Config_Indochino::DB_CACHE_ON) {
            $this->memcache = new Memcache();

            foreach(External_Config_Indochino::$DB_CACHE_SERVERS as $host=>$port) {
                $this->memcache->addServer($host, $port);
            }
        }
    }

    public function set($key, $obj, $time=NULL) {
        if ($this->memcache) {
            if ($time) {
                $this->memcache->set($key, json_encode($obj), FALSE, $time);
            } else {
                $this->memcache->set($key, json_encode($obj));            
            }
        }
    }

    public function replace($key, $obj) {
        if ($this->memcache) {
            return $this->memcache->replace($key, json_encode($obj));
        }
        return FALSE;
    }

    public function exist($key) {
        $exist = FALSE;

        if ($this->memcache) {
            $exist = $this->memcache->get($key);
        }

        return $exist;
    }

    public function get($key) {
        $rv = FALSE;
        if ($this->memcache) {
            $cache = $this->memcache->get($key);
            if ($cache) {
                $rv = json_decode($cache, true);
            }
        }

        return $rv;
    }

    public function delete($key) {
        if ($this->memcache) {
            $cached_value = $this->memcache->get($key);
            if ($cached_value) {
                $this->memcache->delete($key);
            }
        }
    }

    public function register($registry_key, $key) {
        if (!$this->exist($key)) { return; }

        $register = $this->get('r.'.$registry_key);

        if (!$register) {
            $register = array();
        }
        $register[] = $key;

        $replaced = $this->replace('r.' . $registry_key, $register);
        if (!$replaced) {
            $this->set('r.' . $registry_key, $register);
        }
    }

    public function clear_registry($registry_key) {
        $register = $this->get('r.'.$registry_key);

        if ($register) {
            foreach ($register as $key) {
                $this->delete($key);
            }
        }

        $this->delete('r.' . $registry_key);
    }

    public function flush() {
        if ($this->memcache) {
            return $this->memcache->flush();
        }
    }

    public function fetch_keys() {
        $keys = array();

        // Equivalent to calling `stats items` on memcache
        if (!$this->memcache->getStats('items')) {
            return $keys;
        }
        foreach($this->memcache->getStats('items')['items'] as $item => $data) {
            // Cachedumping each slab to get the keys inside and their values.
            foreach($this->memcache->getStats('cachedump', $item, 0) as $key => $value) {
                $keys[$key] = $this->get($key); // we use our interfaced get so it's an array
            }
        }

        return $keys;
    }

    public function get_stats() {
        return $this->memcache->getStats();
    }
}
?>
