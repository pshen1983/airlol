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


    public static function getTripsByUserId($userId, $start, $size) {
        $res = parent::getTripsByUserId($userId, $start, $size);

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