<?php
class GoodDao extends GoodQuery {

    public static function findGoodByLocationAndDay($departure, $arrival, $target) {
        $res = parent::findGoodByLocationAndDay($departure, $arrival, $target);

        $trips = self::newFromQueryResultList($res);

        return $trips;
    }
}