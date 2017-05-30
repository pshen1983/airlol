<?php
class GetUserProfileController extends AjaxController {

    protected function handle($params) {
    	$status = array();

    	$userDao = $params['user_dao'];

    	$status['status'] = 'seccuss';
    	$status['user'] = $userDao->toArray();

    	return $status;
    }
}
?>