<?php
class MapTripGoodDao extends MapTripGoodQuery {

    public static function getGoodTripIds($goodId) {
        $res = parent::getGoodTripIds($goodId);

        $ids = array();
        foreach ($res as $row) {
            $ids[] = $row['trip_id'];
        }

        return $ids;
    }

    public static function getTripGoodIds($tripId) {
        $res = parent::getTripGoodIds($tripId);

        $ids = array();
        foreach ($res as $row) {
            $ids[] = $row['good_id'];
        }

        return $ids;
    }

    public static function getDaoByTripAndGood($tripId, $goodId) {
        $key = self::$table.'_t_'.$tripId.'_g_'.$goodId;
        $res = QueryCacher::instance()->get($key);
        if (!$res) {
            $res = parent::getDaoByTripAndGood($tripId, $goodId);
            QueryCacher::instance()->set($key, $res);
        }

        return self::newFromQueryResult($res);

    }

    // ======================================================================

    protected function actionBeforeInsert() {
        $now = date("Y-m-d H:i:s");
        $this->setCreateTime($now);

        // TODO: calculate response time and update User Dao
    }

    protected function actionBeforeDelete() {
        // Clear Cache
    }

    protected static function cacheById() { return TRUE; }
}