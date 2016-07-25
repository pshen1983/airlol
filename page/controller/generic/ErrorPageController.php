<?php
class ErrorPageController extends PageController {

    protected function handle($params) {

        View::addJs('generic.js');
        View::addCss('generic.css');

        $errorCode = $params['errorid'];

        View::factory('generic/error', array('error_code' => $errorCode));
    }

    protected function getTitle() {
        switch ($this->getLocale()) {
            case 'zh-cn':
                return "";
            case 'zh-tw':
                return "";
            default:
                return "AirLoL Error Page";
        }
    }

    protected function getContent() {
        $rv = array();

        switch ($this->getLocale()) {
            case 'zh-cn':
                $rv = array(
                    'status_msg'=>array(404 => '',
                                        500 => '',
                                        401 => ''));
                break;
            case 'zh-tw':
                $rv = array(
                    'status_msg'=>array(404 => '',
                                        500 => '',
                                        401 => ''));
                break;
            default:
                $rv = array(
                    'status_msg'=>array(404 => 'This Page does NOT exist',
                                        500 => 'There is something wrong 500.',
                                        401 => 'You are not Authorized to view this page.'));

        }

        return $rv;
    }
}
?>