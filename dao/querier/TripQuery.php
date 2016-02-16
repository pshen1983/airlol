<?php
class TripQuery extends TripGenerated {

    public static function findTripByLocationAndDay($departure, $arrival, $start, $end) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('departure_id', $departure)
                     ->where('arrival_id', $arrival)
                     ->where('trip_date', $start, '>=')
                     ->where('trip_date', $end, '<=')
                     ->find_all();

        return $res;
    }
    
}