<?php
class MessageDao extends MessageQuery {

    public static $TYPE_NOMAL=0;
    public static $TYPE_TRIP=1;
    public static $TYPE_GOOD=2;

    public static function getTripGoodMessages($mapId, $start) {
        $res = parent::getTripGoodMessages($mapId, $start);

        return self::newFromQueryResultList($res);
    }

    public static function getAccountMessages($userId, $start, $size) {
        $res = parent::getAccountMessages($userId, $start, $size);

        return self::newFromQueryResultList($res);
    }

    public static function getUserNewMessagesCount($userId) {
        $res = parent::getUserNewMessagesCount($userId);

        return $res['count'];
    }

    public static function getTripGoodNewMessageCount($mapId, $time) {
        $res = parent::getTripGoodNewMessageCount($mapId, $time);

        return $res['count'];
    }

    // ======================================================================

    protected function actionBeforeInsert() {
        $now = date("Y-m-d H:i:s");
        $this->setCreateTime($now);

        $type = $this->getType();
        if (!$type) {
            $this->setType(self::$TYPE_NOMAL);
        }

        // TODO: calculate response time and update User Dao
    }

    protected static function cacheById() { return TRUE; }
}