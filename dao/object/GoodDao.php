<?php
class GoodDao extends GoodQuery {
    public static $PART = 1;
    public static $BAG = 2;

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

    protected function actionBeforeInsert() {
        $type = $this->getGoodType();
        if (empty($type)) {
            $this->setGoodType(self::$PART);
        }

        $this->setActive('Y');

        $now = date("Y-m-d H:i:s");
        $this->setCreateTime($now);
    }

    protected static function cacheById() { return TRUE; }
}