<?php
class ResetPasswordController extends PageController {
    protected function handle($params) {

        $p = $_GET['p'];

        echo json_encode(Cacher::instance()->get($p));

        View::addJs('user.js');
        View::addCss('user.css');

        View::factory('user/resetpassword');
    }
}
?>