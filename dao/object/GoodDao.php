<?php
class GoodDao extends GoodQuery {

    public static function findGoodByLocationAndDay($departure, $arrival, $target, $start, $size) {
        $res = parent::findGoodByLocationAndDay($departure, $arrival, $target, $start, $size);

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
        $now = date("Y-m-d H:i:s");
        $this->setCreateTime($now);
    }

    protected static function cacheById() { return TRUE; }
}