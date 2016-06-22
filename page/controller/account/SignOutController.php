<?php
class SignOutController extends PageController {
    protected function handle($params) {
        session_destroy();
        unset($_COOKIE['REMEMBERME']);
        $this->redirect('/index');
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