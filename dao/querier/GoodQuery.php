<?php
class GoodQuery extends GoodGenerated {

    public static function findGoodsCount($departure, $arrival, $date, $space=null) {
        $query = new QueryBuilder();
        $query->select('COUNT(*) as count', self::$table)
              ->where('departure_code', $departure)
              ->where('arrival_code', $arrival)
              ->where('active', 'Y')
              ->where('end_date', $date, '>=');

        if (!empty($space)) {
            $query->where('type', $space);
        }

        $res = $query->find_one();

        return $res;
    }

    public static function findGoods($departure, $arrival, $date, $start, $size, $space=null) {
        $query = new QueryBuilder();
        $query->select('*', self::$table)
              ->where('departure_code', $departure)
              ->where('arrival_code', $arrival)
              ->where('active', 'Y')
              ->where('end_date', $date, '>=');

        if (!empty($space)) {
            $query->where('type', $space);
        }

        $res = $query->limit($start, $size)->find_all();

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