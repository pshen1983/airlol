<?php
class QueryCacher {
    
    private static $m_instance = null;
    private $memcache = null;

    public static function instance() {
        if (self::$m_instance==null) {
            self::$m_instance = new QueryCacher();
        }

        return self::$m_instance;
    }

    private function __construct() {
        global $db_cache_on, $cache_servers;
        if ($db_cache_on) {
            $this->memcache = new Memcached();

            foreach($cache_servers as $host=>$port) {
                $this->memcache->addServer($host, $port);
            }
        }
    }

    public function set($key, $obj, $time=null) {
        if ($this->memcache) {
            if (!isset($time)) {
                global $cache_time;
                $time = time() + $cache_time;
            }

            $this->memcache->set($key, json_encode($obj), $time);
        }
    }

    public function replace($key, $obj) {
        if ($this->memcache) {
            return $this->memcache->replace($key, json_encode($obj));
        }
        return FALSE;
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
}
?>
