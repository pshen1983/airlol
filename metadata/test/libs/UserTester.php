<?php
class UserTester {

	public static function login($email, $password) {
		global $ch; echo get_called_class().'::'.__FUNCTION__.'()'.PHP_EOL;

		curl_setopt($ch, CURLOPT_URL, 'http://localhost/ajax/account/signin/email');
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/32.0.1700.107 Chrome/32.0.1700.107 Safari/537.36');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("email"=>$email, "password"=>$password)));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		curl_setopt($ch, CURLOPT_COOKIEJAR, '.cairyme_cookie');  //could be empty, but cause problems on some hosts
		curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cairyme.cookie');  //could be empty, but cause problems on some hosts
		$answer = curl_exec($ch);

		if (curl_error($ch)) {
		    echo curl_error($ch).PHP_EOL;
		    exit;
		} else {
			$json = json_decode($answer, true);
		}

		return $json['status'] == 'success';
	}


	public static function register($email, $password, $name) {
		global $ch; echo get_called_class().'::'.__FUNCTION__.'()'.PHP_EOL;

		curl_setopt($ch, CURLOPT_URL, 'http://localhost/ajax/account/signup/email');
		curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/32.0.1700.107 Chrome/32.0.1700.107 Safari/537.36');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("email"=>$email, "passwd"=>$password, "passwd1"=>$password, "name"=>$name)));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		curl_setopt($ch, CURLOPT_COOKIEJAR, '.cairyme_cookie');  //could be empty, but cause problems on some hosts
		curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cairyme.cookie');  //could be empty, but cause problems on some hosts
		$answer = curl_exec($ch);

		if (curl_error($ch)) {
		    echo curl_error($ch).PHP_EOL;
		    exit;
		} else {
			$json = json_decode($answer, true);
		}

		return $json['user_id'] > 0;
	}
}
?>