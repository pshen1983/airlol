<?php
class TripDao extends TripQuery {
    public static $PARTBAG = 1;
    public static $WHOLEBAG = 2;

    public static $WEIGHT_KG = 1;
    public static $WEIGHT_LB = 2;

    public static function findTripByLocationAndDay($departure, $arrival, $endDate, $start, $size) {
        $now = date("Y-m-d");
        $res = parent::findTripByLocationAndDay($departure, $arrival, $now, $endDate, $start, $size);

        $trips = self::newFromQueryResultList($res);

        return $trips;
    }

    public static function findTripByLocationAndDayAndBag($departure, $arrival, $endDate, $start, $size) {
        $now = date("Y-m-d");
        $res = parent::findTripByLocationAndDayAndBag($departure, $arrival, self::$WHOLEBAG, $now, $endDate, $start, $size);

        $trips = self::newFromQueryResultList($res);

        return $trips;
    }

    public static function getTripsByUserIdWithStartEndDate($userId, $startDate, $endDate) {
        $res = parent::getTripsByUserIdWithStartEndDate($userId, $startDate, $endDate);

        $trips = self::newFromQueryResultList($res);

        return $trips;
    }

    public static function getUserFutureTrips($userId) {
        $now = date("Y-m-d");
        $end = date("Y-m-d", strtotime("+2 years"));

        $res = parent::getTripsByUserIdWithStartEndDate($userId, $now, $end);

        $trips = self::newFromQueryResultList($res);

        return $trips;
    }

    public static function getUserPastTrips($userId, $year) {
        $start = $year.'-01-01';
        $end = $year.'-12-31';

        if ($year == date("Y")) {
            $end = date("Y-m-d");
        }

        $res = parent::getTripsByUserIdWithStartEndDate($userId, $start, $end);

        $trips = self::newFromQueryResultList($res);

        return $trips;
    }

    // ======================================================================

    public function getWeightUnit() {
        $unit = parent::getWeightUnit();
        return $unit==self::$WEIGHT_LB ? 'lb' : 'kg';
    }

    protected function actionBeforeInsert() {
        $type = $this->getSpaceType();
        if (empty($type)) {
            $this->setSpaceType(self::$PARTBAG);
        }

        $active = $this->getActive();
        if ($active!='N') { $this->setActive('Y'); }

        $now = date("Y-m-d H:i:s");
        $this->setCreateTime($now);
    }

    protected static function cacheById() { return TRUE; }
}