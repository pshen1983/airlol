<?php
Class View {

	private static $title = '';
	private static $javascripts = array();
	private static $stylesheets = array();

	public static function factory($view, $params=array()) {
		include 'template/header.php';
		include $view.'.php';
		include 'template/footer.php';

		self::$title = '';
		self::$javascripts = array();
		self::$stylesheets = array();
	}

	public static function addTemplate($template, $params=array()) {
		include 'template/'.$template.'.php';
	}

	public static function setTitle($title) {
		self::$title = $title;
	}

	public static function addJs($path) {
		self::$javascripts[] = '/page/js/'.$path;
	}

	public static function addCss($path) {
		self::$stylesheets[] = '/page/css/'.$path;
	}
}
?>