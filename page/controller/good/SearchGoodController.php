<?php
class SearchGoodController extends PageController {

    protected function handle($params) {

        View::addJs('good.js');
        View::addCss('good.css');
        View::factory('good/goods', array());
    }
}
?>