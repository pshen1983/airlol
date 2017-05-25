<?php
class GoodQuery extends GoodGenerated {

    public static function findGoodByLocationAndDay($departure, $arrival, $date, $start, $size) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('departure_code', $departure)
                     ->where('arrival_code', $arrival)
                     ->where('active', 'Y')
                     ->where('end_date', $date, '>=')
                     ->limit($start, $size)
                     ->find_all();

        return $res;
    }

    public static function findGoodByLocationAndDayAndBag($departure, $arrival, $bag, $date, $start, $size) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('departure_code', $departure)
                     ->where('arrival_code', $arrival)
                     ->where('type', $bag)
                     ->where('active', 'Y')
                     ->where('end_date', $date, '>=')
                     ->limit($start, $size)
                     ->find_all();

        return $res;
    }

    public static function getGoodsByUserIdWithStartEndDate($userId, $startDate, $endDate) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('user_id', $userId)
                     ->where('end_date', $startDate, '>=')
                     ->where('end_date', $endDate, '<')
                     ->order('id', true)
                     ->find_all();

        return $res;
    }

    public static function getGoodsAfter($time, $userId) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('user_id', $userId)
                     ->where('end_date', $time, '>')
                     ->order('id', true)
                     ->find_all();

        return $res;
    }
    
}