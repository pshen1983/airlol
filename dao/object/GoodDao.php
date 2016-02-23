<?php
class GoodDao extends GoodQuery {

    public static function findGoodByLocationAndDay($departure, $arrival, $target, $start, $size) {
        $res = parent::findGoodByLocationAndDay($departure, $arrival, $target, $start, $size);

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