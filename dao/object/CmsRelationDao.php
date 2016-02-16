<?php
class CmsRelationDao extends CmsRelationQuery {

    public static function getContents($code, $language) {
        $key = self::$table.'_'.$code.'_'.$language;
        $res = QueryCacher::instance()->get($key);
        if (!$res) {
            $res = parent::getContents($code, $language);
            QueryCacher::instance()->set($key, $res);
        }

        return $res;
    }
}