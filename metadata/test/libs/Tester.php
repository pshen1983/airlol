<?php
class Tester {

	protected static function getResult() {
		global $ch;

		$res = curl_exec($ch);

		if (curl_error($ch)) {
		    echo ' | [ERROR] - '.curl_error($ch).PHP_EOL;
		} else {
			$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if ($code!=200) {
				echo ' | Unexpected HTTP code: '.$code.' '.$res;
				exit;
			}
			$res = json_decode($res, true);
		}

		return $res;
	}
}
?>