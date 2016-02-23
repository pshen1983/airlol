<?php
class MessageDao extends MessageQuery {

    public static function getTripGoodMessages($tripId, $goodId) {
        $res = parent::getTripGoodMessages($tripId, $goodId);

        return self::newFromQueryResultList($res);
    }

    public static function getAccountMessages($userId, $start, $size) {
        $res = parent::getAccountMessages($userId, $start, $size);

        return self::newFromQueryResultList($res);
    }

    // ======================================================================

    protected function actionBeforeInsert() {
        $now = date("Y-m-d H:i:s");
        $this->setCreateTime($now);
    }

    protected static function cacheById() { return TRUE; }
}