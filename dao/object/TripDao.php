<?php
class TripDao extends TripQuery {

    public static function findTripByLocationAndDay($departure, $arrival, $startDate, $days, $start, $size) {
        $endDate = date('Y-m-d', strtotime($startDate. ' + '.$days.' days'))
        $res = parent::findTripByLocationAndDay($departure, $arrival, $startDate, $endDate, $start, $size);

        $trips = self::newFromQueryResultList($res);

        return $trips;
    }

    // ======================================================================

    protected function actionBeforeInsert() {
        $now = date("Y-m-d H:i:s");
        $this->setCreateTime($now);
    }

    protected static function cacheById() { return TRUE; }
}