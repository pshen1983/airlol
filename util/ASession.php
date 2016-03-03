<?php
class ASession {
    const USERID = 'uid';

    public static function init() {
        session_start();
        $_SESSION['uid'] = 0;
    }

    public static function isSignedIn() {
        return isset($_SESSION['uid']) && $_SESSION['uid']>0;
    }

    public static function getSessionUserId() {
        return $_SESSION['uid'];
    }

    public static function setSessionUserId($userId) {
        $_SESSION['uid'] = $userId;
    }
}
?>