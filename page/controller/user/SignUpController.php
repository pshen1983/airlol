<?php
class SignUpController extends PageController {
	protected function handle($params) {
		$status = 0;
		if ($this->isPost()) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$passwd = $_POST['password'];

			$validEmail = Format::isValidEmail($email);
			$validPasswd = Format::isValidPassword($passwd);

			if ($validEmail && $validPasswd) {
				$user = new UserDao();
				$user->setName($name);
				$user->setEmail($email);
				$user->setPassword($passwd);
				if ($user->save()) {
					$status = 1;
					$message = '';
				} else {
					$status = 2;
					$message = '';
				}
			} else if ($validEmail) {
				$status = 3;
				$message = '';
			} else if ($validPasswd) {
				$status = 4;
				$message = '';
			} else {
				$status = 5;
				$message = '';
			}
		}

		View::setTitle('AirLOL | User Sign Up');
		View::addJs('user.js');
		View::addCss('user.css');

		View::factory('user/signup', 
			array('submit'  => 'register',
				  'status'  => $status,
				  'message' => $message)
		);
	}
}
?>