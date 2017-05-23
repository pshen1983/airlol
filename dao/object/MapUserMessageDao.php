<?php
class MapUserMessageDao extends MapUserMessageQuery {

    public static function getDaoByMapAndUser($mapId, $userId) {
        $res = parent::getDaoByMapAndUser($mapId, $userId);

        return self::newFromQueryResult($res);
    }

    // ======================================================================

    protected function actionBeforeInsert() {}

    protected function actionBeforeDelete() {}

    protected static function cacheById() { return TRUE; }
}