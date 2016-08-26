<?php
class CmsRelationQuery extends CmsRelationGenerated {

    public static function getCodeContents($code, $language) {
        $query = new QueryBuilder();
        $res = $query->select('child_code', self::$table)
                     ->where('parent_code', $code)
                     ->find_all();

        $range = array();
        foreach ($res as $row) {
            $range[] = $row['child_code'];
        }

        $res = CmsItemDao::getContents($range, $language);

        return $res;
    }

    public static function getTypeContents($type, $language) {
        $query = new QueryBuilder();
        $res = $query->select('parent_code, child_code', self::$table)
                     ->where('type', $type)
                     ->find_all();

        $range = array();
        foreach ($res as $row) {
            $range[] = $row['child_code'];
        }

        $content = CmsItemDao::getContents($range, $language);

        $airport = array();
        foreach ($res as $row) {
            if (!isset($airport[$row['parent_code']])) {
                $airport[$row['parent_code']] = array();
                $airport[$row['parent_code']]['description'] = CmsItemDao::getCodeContent($row['parent_code'], $language);
            }
            $airport[$row['parent_code']][$row['child_code']] = $content[$row['child_code']];
        }

        return $airport;
    }
}