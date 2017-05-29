<?php
class AccountTester extends Tester {

	public static function login($email, $password) {
		global $ch, $host; echo get_called_class().'::'.__FUNCTION__.'()';

		curl_setopt($ch, CURLOPT_URL, $host.'/account/signin/email');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("email"=>$email, "password"=>$password)));
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		curl_setopt($ch, CURLOPT_COOKIEJAR, '.cairyme.cookie');  //could be empty, but cause problems on some hosts
		curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cairyme.cookie');  //could be empty, but cause problems on some hosts

		$json = self::getResult();

		return $json['status'];
	}


	public static function register($email, $password, $name) {
		global $ch, $host; echo get_called_class().'::'.__FUNCTION__.'()';

		curl_setopt($ch, CURLOPT_URL, $host.'/account/signup/email');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("email"=>$email, "passwd"=>$password, "passwd1"=>$password, "name"=>$name)));
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		curl_setopt($ch, CURLOPT_COOKIEJAR, '.cairyme.cookie');  //could be empty, but cause problems on some hosts
		curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cairyme.cookie');  //could be empty, but cause problems on some hosts
		
		$json = self::getResult();

		return $json['user_id'];
	}
}
?>