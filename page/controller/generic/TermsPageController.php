<?php
class TermsPageController extends PageController {

    protected function handle($params) {

        View::setTitle('AirLOL Terms and Conditions');
        View::addJs('generic.js');
        View::addCss('generic.css');

        View::factory('generic/terms');
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