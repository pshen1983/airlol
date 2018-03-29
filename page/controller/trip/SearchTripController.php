<?php
class SearchTripController extends PageController {

    protected function handle($params) {

        View::addJs('trip.js');
        View::addCss('trip.css');
        View::factory('trip/trips', array());
    }
}
?>