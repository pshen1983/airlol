<?php
class SignOutController extends PageController {
	protected function handle($params) {
		session_destroy();
		$this->redirect('/index');
	}
}
?>