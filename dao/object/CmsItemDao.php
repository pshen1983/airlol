<?php
class CmsItemDao extends CmsItemQuery {

    public static function getContent($code, $language) {
        $key = self::$table.'_'.$code.'_'.$language;
        $res = QueryCacher::instance()->get($key);
        if (!$res) {
            $res = parent::getContent($code, $language);
            QueryCacher::instance()->set($key, $res);
        }

        return $res['content'];
    }
}