<?php
class TripDetailController extends PageController {

    protected function handle($params) {

        View::setTitle('AirLOL Home Page');
        View::addJs('trip.js');
        View::addCss('trip.css');

        View::factory('trip/trip');
    }

    protected function getTitle() {
        switch ($this->getLocale()) {
            case 'zh-cn':
                return "";
            case 'zh-tw':
                return "";
            default:
                return "";
        }
    }

    protected function getContent() {
        $rv = array();

        switch ($this->getLocale()) {
            case 'zh-cn':
                $rv = array();
                break;
            case 'zh-tw':
                $rv = array();
                break;
            default:
                $rv = array();

        }

        return $rv;
    }
}
?>