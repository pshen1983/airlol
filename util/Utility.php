<?php
class Utility {

    public static function getRawRequestData() {
        return file_get_contents('php://input');
    }

    public static function getJsonRequestData() {
        $rawData = file_get_contents('php://input');
        return json_decode($rawData, TRUE);
    }

    public static function getClientIp() {
        $head = apache_request_headers();
        $ip = (isset($head['AIRLOL_FORWARDED_IP']) ? $head['AIRLOL_FORWARDED_IP'] : '');

        if (empty($ip)) { 
            $ip = (isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : '');
        }
        if (empty($ip)) { 
            $ip = (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : '');
        }
        if (empty($ip)) {
            $ip = (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
        }

        return $ip;
    }

    public static function generateToken($length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function generateSid($id) {
        $md5 = md5($id);
        return substr($md5, $id%20, 8);
    }

    public static function setLocaleCookie($locale) {
        setcookie( 'locale', $locale, time()+31536000, '/', 'airlol.com' );
    }

    public static function getSuggestedPriceByGood($currency, $departure, $arrival) {
        return '100'.$currency;
    }

    public static function getSuggestedPriceByTrip($currency, $departure, $arrival) {
        return '100'.$currency;
    }
}
?>