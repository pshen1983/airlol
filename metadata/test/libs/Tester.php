<?php
class Tester {

	protected static function getResult() {
		global $ch;

		$res = curl_exec($ch);

		if (curl_error($ch)) {
		    echo curl_error($ch).PHP_EOL;
		    exit;
		} else {
			$res = json_decode($res, true);
		}

		return $res;
	}
}
?>