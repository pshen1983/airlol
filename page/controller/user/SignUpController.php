<?php
class SignUpController extends PageController {
	protected function handle($params) {


		View::setTitle('AirLOL Home Page');
		View::addJs('user.js');
		View::addCss('user.css');

		View::factory('generic/index');
	}
}
?>