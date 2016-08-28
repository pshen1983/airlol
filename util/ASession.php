<?php
class ASession {
    const USERID = 'uid';

    public static function isSignedIn() {
        return isset($_SESSION['uid']) && $_SESSION['uid']>0;
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