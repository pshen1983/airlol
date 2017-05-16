<?php
class GetCitiesListController extends AjaxController {

    protected function handle($params) {
        $locale = $_GET['locale'];

        $cities = CmsRelationDao::getTypeContents(CmsRelationDao::$AIRPORT, $locale);

        return $cities;
    }
}
?>