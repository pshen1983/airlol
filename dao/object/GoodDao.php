<?php
class GoodDao extends GoodQuery {
    public static $PART = 1;
    public static $BAG = 2;

    public static $WEIGHT_KG = 1;
    public static $WEIGHT_LB = 2;

    public function getDisplayValue() {
        return $this->getPrice().$this->getCurrency();
    }

    public static function findGoodByLocationAndDay($departure, $arrival, $date, $start, $size) {
        $res = parent::findGoodByLocationAndDay($departure, $arrival, $date, $start, $size);

        $goods = self::newFromQueryResultList($res);

        return $goods;
    }

    public static function findGoodByLocationAndDayAndBag($departure, $arrival, $date, $start, $size) {
        $res = parent::findGoodByLocationAndDayAndBag($departure, $arrival, self::$BAG, $date, $start, $size);

        $goods = self::newFromQueryResultList($res);

        return $goods;
    }

    public static function getGoodsByUserIdWithStartEndDate($userId, $startDate, $endDate) {
        $res = parent::getGoodsByUserIdWithStartEndDate($userId, $startDate, $endDate);

        $goods = self::newFromQueryResultList($res);

        return $goods;
    }

    public static function getGoodsAfter($time, $userId) {
        $res = parent::getGoodsAfter($time, $userId);

        return self::newFromQueryResultList($res);
    }

    public static function getUserFutureGoods($userId) {
        $now = date("Y-m-d");
        $end = date("Y-m-d", strtotime("+2 years"));

        $res = parent::getGoodsByUserIdWithStartEndDate($userId, $now, $end);

        $goods = self::newFromQueryResultList($res);

        return $goods;
    }

    public static function getUserPastGoods($userId, $year) {
        $start = $year.'-01-01';
        $end = $year.'-12-31';

        if ($year == date("Y")) {
            $end = date("Y-m-d");
        }

        $res = parent::getGoodsByUserIdWithStartEndDate($userId, $start, $end);

        $goods = self::newFromQueryResultList($res);

        return $goods;
    }

    // ======================================================================

    public function getWeightUnit() {
        $unit = parent::getWeightUnit();
        return $unit==self::$WEIGHT_LB ? 'lb' : 'kg';
    }

    protected function actionBeforeInsert() {
        $type = $this->getType();
        if (empty($type)) {
            $this->setGoodType(self::$PART);
        }

        $this->setActive('Y');

        $now = date("Y-m-d H:i:s");
        $this->setCreateTime($now);

        $endDate = $this->getEndDate();
        if (empty($endDate)) {
            $endDate = date('Y-m-d H:i:s', strtotime("+90 days"));
            $this->setEndDate($endDate);
        }
    }

    protected static function cacheById() { return TRUE; }
}