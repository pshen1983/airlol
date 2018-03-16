<?php
class MyTripsController extends PageController {

    protected function handle($params) {
        $uid = ASession::getSessionUserId();
        $userDao = new UserDao($uid);

        if (!$userDao->isFromDB()) {
			header('Location: /');
			exit();
        }

        View::factory('trip/trips', array());
    }
}
?>