<?php
class SignOutController extends AjaxController {

    protected function handle($params) {
        $this->logoutCookie();
        setcookie('REMEMBERME', '');
        session_destroy();

        return array('status' => 0);
    }
}
?>