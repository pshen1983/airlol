<?php
class CmsRelationDao extends CmsRelationQuery {

    public static $AIRPORT = "AIRPORT";

    public static $EUROPE = "EUROPE";
    public static $NORTH_AMERICA = "NORTHAMERICA";
    public static $CHINA = "CHINA";

    public static function getCodeContents($code, $language) {
        $key = self::$table.'_c_'.$code.'_'.$language;
        $res = QueryCacher::instance()->get($key);
        if (!$res) {
            $res = parent::getCodeContents($code, $language);
            QueryCacher::instance()->set($key, $res);
        }

        return $res;
    }

    public static function getTypeContents($type, $language) {
        $key = self::$table.'_t_'.$type.'_'.$language;
        $res = QueryCacher::instance()->get($key);
        if (!$res) {
            $res = parent::getTypeContents($type, $language);
            QueryCacher::instance()->set($key, $res);
        }

        return $res;
    }
}