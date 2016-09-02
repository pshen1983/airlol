<?php
Class View {

    private static $title = '';
    private static $javascripts = array();
    private static $stylesheets = array();
    private static $params = array();
    private static $content = array();

    public static function factory($view, $params=array()) {
        include 'template/header.php';
        include $view.'.php';
        include 'template/footer.php';

        self::$title = '';
        self::$javascripts = array();
        self::$stylesheets = array();
        self::$params = array();
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

    public static function addParam($param) {
        foreach ($param as $key=>$val) {
            self::$params[$key] = $val;
        }
    }

    public static function setContent($content) {
        self::$content = $content;
    }
}
?>