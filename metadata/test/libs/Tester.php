<?php
class Tester {

	protected static function getResult() {
		global $ch;

		$res = curl_exec($ch);

		if (curl_error($ch)) {
		    echo '[ERROR] - '.curl_error($ch).PHP_EOL;
		} else {
			$res = json_decode($res, true);
		}

		return $res;
	}
}
?>