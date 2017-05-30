<?php
class GetSessionUserController extends AjaxController {

    protected function handle($params) {
    	$status = array();

    	$userId = ASession::getSessionUserId();
    	$userDao = new UserDao($userId);

    	$status['status'] = 'seccuss';
    	$status['user'] = $userDao->toArray();

    	return $status;
    }
}
?>