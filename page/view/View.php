<?php
Class View {

	public static function factory($view, $params=array()) {
		include $view.'.php';
	}
}
?>