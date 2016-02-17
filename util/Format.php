<?php
class Format {

    public static function isValidEmail($email)  {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function isValidPassword($passwd) {
        return true;
    }

    public static function isValidMySQLDate($date, $isFuture=false) {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        $flag = true;
        if ($isFUture) {
            $today = date('Y-m-d');
            $dateST = strtotime($date);
            $todayST = strtotime($today);
            $flag = ($dateST >= $todayST);
        }
        return $flag && $d && ($d->format($format) == $date);
    }
}
?>