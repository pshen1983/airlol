<?php
class MapTripGoodQuery extends MapTripGoodGenerated {

    public static function getGoodTripIds($goodId) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('good_id', $goodId)
                     ->order('id', true)
                     ->find_all();

        return $res;
    }

    public static function getTripGoodIds($tripId) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('trip_id', $tripId)
                     ->order('id', true)
                     ->find_all();

        return $res;
    }

    public static function getDaoByTripAndGood($tripId, $goodId) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('trip_id', $tripId)
                     ->where('good_id', $goodId)
                     ->find_one();

        return $res;
    }
}
?>