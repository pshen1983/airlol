<?php
class MessageQuery extends MessageGenerated {

    public static function getTripGoodMessages($tripId, $goodId) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('trip_id', $tripId)
                     ->where('good_id', $goodId)
                     ->order('id', true)
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
}