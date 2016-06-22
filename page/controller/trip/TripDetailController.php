<?php
class TripDetailController extends PageController {

    protected function handle($params) {

        View::setTitle('AirLOL Home Page');
        View::addJs('generic.js');
        View::addCss('generic.css');

        View::factory('generic/index');
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