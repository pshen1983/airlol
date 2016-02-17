<?php
class GoodDao extends GoodQuery {

    public static function findGoodByLocationAndDay($departure, $arrival, $target, $start, $size) {
        $res = parent::findGoodByLocationAndDay($departure, $arrival, $target, $start, $size);

        $trips = self::newFromQueryResultList($res);

        return $trips;
    }
}