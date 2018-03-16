<?php
class MyGoodsController extends PageController {

    protected function handle($params) {
        $uid = ASession::getSessionUserId();
        $userDao = new UserDao($uid);

        if (!$userDao->isFromDB()) {
			header('Location: /');
			exit();
        }

        View::factory('good/goods', array());
    }
}
?>