<?php
abstract class PageController {
	public function execute($params) {
		$this->handle($params);
	}

	protected function isPost() {
		return $_SERVER['REQUEST_METHOD']=='POST';
	}

	abstract protected function handle($params);
}
?>