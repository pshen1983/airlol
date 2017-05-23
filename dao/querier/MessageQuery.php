<?php
class MessageQuery extends MessageGenerated {

    public static function getTripGoodMessages($mapId, $start) {
        global $message_size;
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('trip_good_map_id', $mapId)
                     ->order('id', true)
                     ->limit($start, $message_size)
                     ->find_all();

        return $res;
    }

    public static function getAccountMessages($userId, $start, $size) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('sender', $userId)
                     ->where('receiver', $userId, '=', true)
                     ->order('id', true)
                     ->limit($start, $size)
                     ->find_all();

        return $res;
    }

    public static function getUserNewMessagesCount($userId) {
        $query = new QueryBuilder();
        $res = $query->select('COUNT(*) as count', self::$table)
                     ->where('receiver', $userId)
                     ->find_one();

        return $res;
    }

    public static function getTripGoodNewMessageCount($mapId, $time) {
        $query = new QueryBuilder();
        $res = $query->select('COUNT(*) as count', self::$table)
                     ->where('trip_good_map_id', $mapId)
                     ->where('create_time', $time, '<')
                     ->find_one();

        return $res;
    }
}