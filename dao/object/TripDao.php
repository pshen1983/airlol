<?php
class TripDao extends TripQuery {
    public static $PARTBAG = 1;
    public static $WHOLEBAG = 2;

    public static function findTripByLocationAndDay($departure, $arrival, $startDate, $endDate, $start, $size) {
        $res = parent::findTripByLocationAndDay($departure, $arrival, $startDate, $endDate, $start, $size);

        $trips = self::newFromQueryResultList($res);

        return $trips;
    }

    public static function findTripByLocationAndDayAndBag($departure, $arrival, $startDate, $endDate, $start, $size) {
        $res = parent::findTripByLocationAndDayAndBag($departure, $arrival, self::$WHOLEBAG, $startDate, $endDate, $start, $size);

        $trips = self::newFromQueryResultList($res);

        return $trips;
    }


    public static function getTripsByUserId($userId, $start, $size) {
        $res = parent::getTripsByUserId($userId, $start, $size);

        $trips = self::newFromQueryResultList($res);

        return $trips;
    }

    // ======================================================================

    protected function actionBeforeInsert() {
        $type = $this->getSpaceType();
        if (empty($type)) {
            $this->setSpaceType(self::$PARTBAG);
        }

        $this->setActive('Y');

        $now = date("Y-m-d H:i:s");
        $this->setCreateTime($now);
    }

    protected static function cacheById() { return TRUE; }
}