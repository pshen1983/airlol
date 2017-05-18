<?php
class CmsItemDao extends CmsItemQuery {

	public static $TYPE_CITY = 2;

    public static function getCodeContent($code, $language) {
        $key = self::$table.'_'.$code.'_'.$language;
        $res = QueryCacher::instance()->get($key);
        if (!$res) {
            $res = parent::getCodeContent($code, $language);
            QueryCacher::instance()->set($key, $res);
        }

        return $res['content'];
    }

    public static function getCityContent($language) {
        $key = self::$table.'_city_'.$language;
        $res = QueryCacher::instance()->get($key);
        if (!$res) {
            $res = parent::getTypeContents(self::$TYPE_CITY, $language);
            QueryCacher::instance()->set($key, $res);
        }

        return $res;
    }


}