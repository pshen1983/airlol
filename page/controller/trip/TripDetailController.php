<?php
class TripDetailController extends PageController {
    protected function handle($params) {

        View::setTitle('AirLOL Home Page');
        View::addJs('generic.js');
        View::addCss('generic.css');

        View::factory('generic/index');
    }
}
?>