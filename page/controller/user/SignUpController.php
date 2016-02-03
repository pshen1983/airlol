<?php
class SignUpController extends PageController {
	protected function handle($params) {
		if ($this->isPost()) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$passwd = $_POST['password'];

			$user = new UserDao();
			$user->setName($name);
			$user->setEmail($email);
			$user->setPassword($passwd);
			$user->save();
		}

		View::setTitle('AirLOL | User Sign Up');
		View::addJs('user.js');
		View::addCss('user.css');

		View::factory('user/signup', array('submit' => 'register'));
	}
}
?>