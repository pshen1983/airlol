<?php
class ASession {
    const USERID = 'uid';

    public static function isSignedIn() {
        global $env;

        $session = isset($_SESSION['uid']) && $_SESSION['uid']>0;

        $test = $evn!='production' && isset($_GET['test_session']) && $_GET['test_session'] == 1;

        return $session || $test;
    }

    public static function getSessionUserId() {
        return $_SESSION['uid'];
    }

    public static function setSessionUserId($userId) {
        $_SESSION['uid'] = $userId;
    }

    public static function set($name, $val) {
        $_SESSION[$name] = $val;
    }

    public static function get($name) {
        return $_SESSION[$name];
    }
}
?>