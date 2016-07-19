<?php
class SignOutController extends PageController {

    protected function handle($params) {
        $this->logoutCookie();
        setcookie('REMEMBERME', '');
        session_destroy();
        $this->redirect('/');
    }
}
?>