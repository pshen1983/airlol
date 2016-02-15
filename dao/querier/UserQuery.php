<?php
class UserQuery extends UserGenerated {

    public static function existEmail($email) {
        $query = new QueryBuilder();
        $res = $query->select('COUNT(*) as count', self::$table)
                     ->where('email', $email)
                     ->find_one();

        return $res['count'];
    }

    public static function getUserByEmail($email) {
        $query = new QueryBuilder();
        $res = $query->select('*', self::$table)
                     ->where('email', $email)
                     ->find_one();

        return $res;
    }
}