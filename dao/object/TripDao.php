<?php
class TripDao extends TripQuery {

    public static function findTripByLocationAndDay($departure, $arrival, $start, $days) {
        $end = date('Y-m-d', strtotime($start. ' + '.$days.' days'))
        $res = parent::findTripByLocationAndDay($departure, $arrival, $start, $end);

        $trips = self::newFromQueryResultList($res);

        return $trips;
    }
}