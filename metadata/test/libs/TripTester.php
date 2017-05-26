<?php
class TripTester {

	public static function getUserTrips() {
		global $ch; echo get_called_class().'::'.__FUNCTION__.'()'.PHP_EOL;

		curl_setopt($ch, CURLOPT_URL, 'http://localhost/ajax/trip/user/list');
		curl_setopt($ch, CURLOPT_POST, false);
		$answer = curl_exec($ch);
		if (curl_error($ch)) {
		    echo curl_error($ch).PHP_EOL;
		    exit;
		} else {
			$answer = json_decode($answer, true);
		}

		return isset($answer['past']);
	}
}
?>