<?php
class ASession {
    const USERID = 'uid';

    public static function isSignedIn() {
        global $env;

        $session = isset($_SESSION['uid']) && $_SESSION['uid']>0;

        $test = $env!='production' && isset($_GET['test_user']) && $_GET['test_user']>0;

        return $session || $test;
    }

    public static function getSessionUserId() {
        global $env;

        $test = $env!='production' && isset($_GET['test_user']) && $_GET['test_user']>0;

        return $test ? $_GET['test_user'] : $_SESSION['uid'];
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