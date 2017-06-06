<?php
class ForgetPasswordController extends AjaxController {

    protected function handle($params) {
    	$userDao = UserDao::getUserByEmail($params['email']);

    	if (isset($userDao) && $userDao->isFromDB()) {
	        $token = Utility::generateToken();

	        $key = $token.'_'.date(YmdHis);

	        $value = array('uid' => $userDao->getId(), 'email' => $params['email']);

	        Cacher::set($key, $value, 86400);

	        Mailer::sendResetPasswordEmail($params['email'], $userDao->getName(), $key);
	    }

        return array('status' => 'success');
    }
}
?>