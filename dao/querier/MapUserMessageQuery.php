<?php
class MapUserMessageQuery extends MapUserMessageGenerated {

    public static function getDaoByMapAndUser($mapId, $userId) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('map_id', $mapId)
                     ->where('user_id', $userId)
                     ->find_one();

        return $res;
    }
}
?>