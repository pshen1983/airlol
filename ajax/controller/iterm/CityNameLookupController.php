<?php
class CityNameLookupController extends AjaxController {

    protected function handle($params) {
        $cities = CmsItemDao::getCityContent($_GET['locale']);

        return $cities;
    }
}
?>