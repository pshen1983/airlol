<?php
class SignOutController extends PageController {

    protected function handle($params) {
        session_destroy();
        unset($_COOKIE['REMEMBERME']);
        $this->redirect('/');
    }
}
?>