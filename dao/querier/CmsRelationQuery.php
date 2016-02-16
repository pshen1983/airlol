<?php
class CmsRelationQuery extends CmsRelationGenerated {

    publid static $NORTH_AMERICA = "NORTHAMERICA";
    publid static $CHINA = "CHINA";

    public static function getContents($code, $language) {
        $query = new QueryBuilder();
        $res = $query->select('child_code', self::$table)
                     ->where('parent_code', $code)
                     ->find_all();

        $range = array();
        foreach ($res as $row) {
            $range[] = $row['child_code'];
        }

        $res = CmsItemQuery::getContents($range, $language);

        return $res;
    }

}