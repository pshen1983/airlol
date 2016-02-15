<?php
abstract class AirlolDaoBase {

    /**
     * the database column name to value holder array.
     * 
     * ( e.g. for a database with 3 columns: "id, col1, col2", 
     *   $var should have $var['id'], $var['col1'], $var['col2'] 3 key => value entries.
     *   $var should be set in the constructor of each subclass implementation.)
     *   
     * @var array
     */
    protected $var = array();

    protected $update = array();

    protected $fromDB = FALSE;

    /**
     * constructor to make an address dao
     * 
     * @param integer $id - database id
     */
    public function __construct( $id=0 ) {
        if ($id==0) { $this->init(); }
        else { $this->retrieve($id); }
    }

    /**
     * get list of objects in range.
     * 
     * @param unknown_type $ids
     */
    public static function getRange($ids, $order='id', $desc=TRUE) {
        if (empty($ids)) return array();

        $class = get_called_class();

        if (count($ids)<51 && self::isIdCaching()) {
            $objs = array();
            foreach ($ids as $id) {
                if (empty($id)) { continue; }
                $obj = new $class($id);
                $objs[] = $obj;
            }
        } else {
            $builder = new QueryBuilder();
            $res = $builder->select('*', $class::$table)
                           ->in('id', $ids)
                           ->order($order, $desc)
                           ->find_all();
    
            $objs = self::newFromQueryResultList($res, get_called_class());
        }

        return $objs;
    }

    /**
     * Returns a list of all the ids
     */
    public static function getIds() {
        $class = get_called_class();
        $ids = array();
        $query = new QueryBuilder();
        $res = $query->select('id', $class::$table)
                     ->find_all();
        foreach($res as $obj) {
            $ids[] = $obj['id'];
        }
        return $ids;
    }

    /**
     * Retrieve an object from database based on id
     * @param $id - the database primary key id
     */
    protected function retrieve($id) {
        $res = null;

        $id_column = $this->getIdColumnName();

        $cacher = QueryCacher::instance();
        if (self::isIdCaching()) {
            $res = $cacher->get(static::$table.'.'.$id);
        } 

        if (!isset($res)) {
            $query = new QueryBuilder();
            $res = $query->select('*', static::$table)
                         ->where($id_column, $id)
                         ->find_one();

            if (self::isIdCaching()) {
                $cacher->set(static::$table.'.'.$id, $res);
            }
        }

        if (isset($res) && $res) {
            $this->var = $res;
            $this->fromDB = TRUE;
        } else {
            $this->init();
        }
    }

    /**
     * Saves the object to database, if primary key value exists do update, if not do insert.
     */
    final public function save() {
        // get the primary key value from abstract implementation of sub class
        //
        $id = $this->var[$this->getIdColumnName()];

        if ( isset($id) && !empty($id) && $id!=0 ) {
            $this->actionBeforeUpdate();
            return $this->update();
        }
        else {
            $this->actionBeforeInsert();
            return $this->insert();
        }
    }

    final public function delete() {
        $this->actionBeforeDelete();
        if (self::isIdCaching()) {
            $cache_key = static::$table.'.'.$this->var[$this->getIdColumnName()];
            QueryCacher::instance()->delete($cache_key);
        }
        $this->doDelete();
    }

    protected function doDelete() {
        // get the primary key value from abstract implementation of sub class
        //
        $id = $this->var[$this->getIdColumnName()];

        $builder = new QueryBuilder();
        $res = $builder->delete(static::$table)
                       ->where($this->getIdColumnName(), $id)
                       ->execute();
        if ($res) {
            $this->fromDB = FALSE;
        }

        return $res;
    }

    /**
     * Convert the DAO to an array presentation with keys to be the column names.
     * 
     * @param array $skips - skipped columns in the return array.
     */
    public function toArray($skips=array()) {
        $rv = $this->var;
        foreach ($skips as $skip) {
            unset($rv[$skip]);
        }

        return $rv;
    }

    /**
     * Check if this dao is loaded from database.
     */
    public function isFromDB() {
        return $this->fromDB;
    }

    /**
     * Insert an object to database
     */
    protected function insert() {
        $id_column = $this->getIdColumnName();

        $fields = $this->var;
        unset($fields[$id_column]);

        $query = new QueryBuilder();
        $res = $query->insert($fields, static::$table)
                     ->execute();

        $this->update = array_fill_keys(array_values($this->update), false);

        if ($res!=-1) {
            $this->var[$id_column] = $res;
            $this->fromDB = TRUE;
        } else {
            $message = '';
            foreach ($query->get_errors() as $error) {
                $message .= $error.' | ';
            }
            Logger::error('[DB ERROR] Insert Failed: ' . $message, Logger::DB);
        }

        return $res!=-1;
    }

    /**
     * update the database row of the object
     */
    protected function update() {
        $id_column = $this->getIdColumnName();

        $set = array();
        foreach ($this->update as $key=>$val) {
            if ($val) {
                $set[$key] = $this->var[$key];
            }
        }

        if (!empty($set)) {
            $builder = new QueryBuilder();
            $res = $builder->update($set, static::$table)
                           ->where($id_column, $this->var[$id_column])
                           ->execute();
            if ($res) {
                $this->update = array_fill_keys(array_values($this->update), false);
                if (self::isIdCaching()) {
                    QueryCacher::instance()->delete(static::$table.'.'.$this->var[$id_column]);
                }
            }
        } else {
            $res = true;
        }

        return $res;
    }

    /**
     * Enter description here ...
     * @param unknown_type $res
     */
    protected static function newFromQueryResult($res) {
        $object = null;
        $class = get_called_class();
        if ($res) {
            $object = new $class;
            $object->var = $res;
            $object->fromDB = TRUE;
        }

        return $object;
    }

    /**
     * Enter description here ...
     * @param unknown_type $res
     */
    protected static function newFromQueryResultList($res) {
        $objects = array();
        $class = get_called_class();
        if (isset($res)) {
            foreach ($res as $row) {
                $object = new $class;
                $object->var = $row;
                $object->fromDB = TRUE;
                array_push($objects, $object);
            }
        }

        return $objects;
    }

    private static function isIdCaching() {
        global $db_cache_on, $cache_servers;
        return $db_cache_on && static::cacheById();
    }

    protected static function clearCache() {
        if (static::cacheById()) {
            $ids = static::get_ids();
            foreach($ids as $id) {
                $cache_key = static::$table . '.'. $id;
                QueryCacher::instance()->delete($cache_key);
            }
        }
    }

//====================================== abstract functions ======================================

    /**
     * Enter description here ...
     */
    protected function actionBeforeInsert() {}

    /**
     * Enter description here ...
     */
    protected function actionBeforeUpdate() {}

    /**
     * Enter description here ...
     */
    protected function actionBeforeDelete() {}

    /**
     * Enter description here ...
     */
    protected static function cacheById() { return FALSE; }

    /**
     * Enter description here ...
     */
    abstract protected function init();

    /**
     * returns the database primary key id column name
     */
    abstract protected function getIdColumnName();
}
