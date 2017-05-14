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


    public static function getGoodsByUserId($userId, $start, $size) {
        $res = parent::getGoodsByUserId($userId, $start, $size);

        $goods = self::newFromQueryResultList($res);

        return $goods;
    }

    // ======================================================================

    public function getWeightUnit() {
        $unit = parent::getWeightUnit();
        return $unit==self::$WEIGHT_LB ? 'lb' : 'kg';
    }

    protected function actionBeforeInsert() {
        $type = $this->getGoodType();
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