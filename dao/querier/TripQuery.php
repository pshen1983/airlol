<?php
class TripQuery extends TripGenerated {

    public static function findTripByLocationAndDay($departure, $arrival, $startDate, $endDate, $start, $size) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('departure_code', $departure)
                     ->where('arrival_code', $arrival)
                     ->where('active', 'Y')
                     ->where('trip_date', $startDate, '>=')
                     ->where('trip_date', $endDate, '<=')
                     ->limit($start, $size)
                     ->find_all();

        return $res;
    }

    public static function findTripByLocationAndDayAndBag($departure, $arrival, $bag, $startDate, $endDate, $start, $size) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('departure_code', $departure)
                     ->where('arrival_code', $arrival)
                     ->where('space_type', $bag)
                     ->where('active', 'Y')
                     ->where('trip_date', $startDate, '>=')
                     ->where('trip_date', $endDate, '<=')
                     ->limit($start, $size)
                     ->find_all();

        return $res;
    }

    public static function getTripsByUserId($userId, $start, $size) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('user_id', $userId)
                     ->limit($start, $size)
                     ->find_all();

        return $res;
    }
    
}