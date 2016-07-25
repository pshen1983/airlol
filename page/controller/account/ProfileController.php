<?php
class ProfileController extends PageController {
    protected function handle($params) {

        View::addJs('account.js');
        View::addJs('jquery.imgareaselect.js');
        View::addCss('account.css');
        View::addCss('imgareaselect-default.css');

        $uid = ASession::getSessionUserId();
        $userDao = new UserDao($uid);
        if ($userDao->isFromDB()) {
            $paramArr = $userDao->toArray(array('password'));

            global $profile_image_folder;
            $paramArr['profile_img'] = $profile_image_folder.'/'.$paramArr['profile_img'];

            if (isset($paramArr['birth_day'])) {
                $time = strtotime($paramArr['birth_day']);
                $paramArr['birth_year'] = date('Y', $time);
                $paramArr['birth_month'] = date('m', $time);
            }
            unset($paramArr['birth_day']);

        } else {
            $this->redirect('/error/500');
        }

        View::factory('account/profile', $paramArr);
    }

    protected function getTitle() {
        switch ($this->getLocale()) {
            case 'zh-cn':
                return "";
            case 'zh-tw':
                return "";
            default:
                return "AirLoL | Profile";
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

    protected function isAuthenticatedPage() { return true; }
}
?>