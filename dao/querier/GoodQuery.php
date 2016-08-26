<?php
class GoodQuery extends GoodGenerated {

    public static function findGoodByLocationAndDay($departure, $arrival, $target, $start, $size) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('departure_id', $departure)
                     ->where('arrival_id', $arrival)
                     ->where('active', 'Y')
                     ->where('end_date', $target, '>=')
                     ->limit($start, $size)
                     ->find_all();

        return $res;
    }

    public static function getGoodsByUserId($userId, $start, $size) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('user_id', $userId)
                     ->limit($start, $size)
                     ->find_all();

        return $res;
    }
    
}