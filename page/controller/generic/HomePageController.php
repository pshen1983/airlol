<?php
class HomePageController extends PageController {
	protected function handle($params) {
		View::factory('generic/index');
	}
}
?>