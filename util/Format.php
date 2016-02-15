<?php
class Format {

    public static function isValidEmail($email)  {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function isValidPassword($passwd) {
        return true;
    }
}
?>