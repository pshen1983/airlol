<?php
class ForgetPasswordController extends PageController {
	protected function handle($params) {


		View::addJs('user.js');
		View::addCss('user.css');

		View::factory('user/forgetpassword');
	}
}
?>