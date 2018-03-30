<?php
class CmsItemQuery extends CmsItemGenerated {

    public static function getCodeContent($code, $language) {
        $query = new QueryBuilder();
        $res = $query->select('content', self::$table)
                     ->where('code', $code)
                     ->where('language', $language)
                     ->find_one();

        return $res;
    }

    public static function getContents($codes, $language) {
        $query = new QueryBuilder();
        $res = $query->select('code, content', self::$table)
                     ->in('code', $codes)
                     ->where('language', $language)
                     ->find_all();

        $return = array();
        foreach ($res as $row) {
            $return[$row['code']] = $row['content'];
        }

        return $return;
    }

    public static function getTypeContents($type, $language) {
        $query = new QueryBuilder();
        $res = $query->select('code, content', self::$table)
                     ->where('type', $type)
                     ->where('language', $language)
                     ->find_all();

        $return = array();
        foreach ($res as $row) {
            $return[$row['code']] = $row['content'];
        }

        return $return;
    }
    
}