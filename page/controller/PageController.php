<?php
abstract class PageController {
	public function execute($params) {
		$this->handle($params);
	}

	abstract protected function handle($params);
}
?>