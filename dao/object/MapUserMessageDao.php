<?php
class MapUserMessageDao extends MapUserMessageQuery {

    public static function getDaoByMapAndUser($mapId, $userId) {
        $key = self::$table.'_m_'.$mapId.'_u_'.$userId;
        $res = QueryCacher::instance()->get($key);
        if (!$res) {
        	$res = parent::getDaoByMapAndUser($mapId, $userId);
            if ($res) {
            	QueryCacher::instance()->set($key, $res);
            }
        }

        return self::newFromQueryResult($res);
    }

    // ======================================================================

    protected function actionBeforeInsert() {}

    protected function actionBeforeDelete() {
        $key = self::$table.'_m_'.$this->getMapId().'_u_'.$this->getUserId();
        QueryCacher::instance()->delete($key);
    }

    protected static function cacheById() { return TRUE; }
}