<?php
class TripQuery extends TripGenerated {

    public static function findTripByLocationAndDay($departure, $arrival, $startDate, $endDate, $start, $size) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('departure_id', $departure)
                     ->where('arrival_id', $arrival)
                     ->where('trip_date', $startDate, '>=')
                     ->where('trip_date', $endDate, '<=')
                     ->limit($start, $size)
                     ->find_all();

        return $res;
    }
    
}