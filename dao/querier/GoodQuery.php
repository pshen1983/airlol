<?php
class GoodQuery extends GoodGenerated {

    public static function findGoodByLocationAndDay($departure, $arrival, $target) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('departure_id', $departure)
                     ->where('arrival_id', $arrival)
                     ->where('end_date', $target, '>=')
                     ->find_all();

        return $res;
    }
    
}