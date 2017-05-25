<?php
class RatingQuery extends RatingGenerated {

    public static function getLastRateTime($userId, $type) {
        $query = new QueryBuilder();
        $res = $query->select('create_time', self::$table)
                     ->where('rater_id', $userId)
                     ->where('type', $type)
                     ->order('create_time', true)
                     ->find_one();

        return $res;
    }
    
}