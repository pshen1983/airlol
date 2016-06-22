<?php
class ProfileController extends PageController {
    protected function handle($params) {


        View::addJs('account.js');
        View::addCss('account.css');

        View::factory('account/profile');
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