<?php
class SignInController extends PageController {
	protected function handle($params) {

		$userDao = UserDao::getUserByEmail('a');
		error_log(json_encode($userDao->toArray()));

		View::addJs('user.js');
		View::addCss('user.css');

		View::factory('user/signin');
	}
}
?>