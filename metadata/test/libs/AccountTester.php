<?php
class AccountTester extends Tester {

	public static function login($email, $password) {
		global $ch; echo get_called_class().'::'.__FUNCTION__.'()';

		curl_setopt($ch, CURLOPT_URL, 'http://localhost/ajax/account/signin/email');
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/32.0.1700.107 Chrome/32.0.1700.107 Safari/537.36');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("email"=>$email, "password"=>$password)));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		curl_setopt($ch, CURLOPT_COOKIEJAR, '.cairyme.cookie');  //could be empty, but cause problems on some hosts
		curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cairyme.cookie');  //could be empty, but cause problems on some hosts

		$json = self::getResult();

		return $json['status'];
	}


	public static function register($email, $password, $name) {
		global $ch; echo get_called_class().'::'.__FUNCTION__.'()';

		curl_setopt($ch, CURLOPT_URL, 'http://localhost/ajax/account/signup/email');
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/32.0.1700.107 Chrome/32.0.1700.107 Safari/537.36');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("email"=>$email, "passwd"=>$password, "passwd1"=>$password, "name"=>$name)));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		curl_setopt($ch, CURLOPT_COOKIEJAR, '.cairyme.cookie');  //could be empty, but cause problems on some hosts
		curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cairyme.cookie');  //could be empty, but cause problems on some hosts
		
		$json = self::getResult();

		return $json['user_id'];
	}
}
?>