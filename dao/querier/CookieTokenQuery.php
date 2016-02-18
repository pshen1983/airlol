<?php
class CookieTokenQuery extends CookieTokenGenerated {

    public static function getTokenByTypeAndValueAndExpire($type, $value, $expire) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('type', $type)
                     ->where('value', $value)
                     ->where('expires', $expire, '>')
                     ->find_one();

        return $res;
    }
}
?>