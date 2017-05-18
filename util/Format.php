<?php
class Format {

    public static function isValidEmail($email)  {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function isValidPassword($passwd) {
        $valid = true;

        $valid = strlen($passwd) >= 8;

        return $valid;
    }

    public static function isValidMySQLDate($date, $isFuture=false) {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        $flag = true;
        if ($isFuture) {
            $today = date('Y-m-d');
            $dateST = strtotime($date);
            $todayST = strtotime($today);
            $flag = ($dateST >= $todayST);
        }
        return $flag && $d && ($d->format('Y-m-d') == $date);
    }
}
?>