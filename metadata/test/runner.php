<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/32.0.1700.107 Chrome/32.0.1700.107 Safari/537.36');

$params = array();
$result = true;

function checkResult() {
	global $result, $params;
	if ($result) {
		echo '   -   '.chr(27).'[0;32mPASS'.chr(27).'[0m '.json_encode($params).PHP_EOL;
	} else {
		echo '   -   '.chr(27).'[0;31mFAIL'.chr(27).'[0m '.json_encode($params).PHP_EOL;
		exit;
	}
}

include dirname(__FILE__).'/libs/Tester.php';
include dirname(__FILE__).'/libs/UserTester.php';
include dirname(__FILE__).'/libs/TripTester.php';
include dirname(__FILE__).'/libs/GoodTester.php';
include dirname(__FILE__).'/libs/AccountTester.php';
include dirname(__FILE__).'/libs/MessageTester.php';
include dirname(__FILE__).'/libs/iTermTester.php';

if (count($argv)<2) {
	echo 'Usage: "php runner.php 001"'.PHP_EOL;
	exit;
}

include dirname(__FILE__).'/cases/'.$argv[1].'.php';

if ($result) {
	echo "==== Test Successful! ====".PHP_EOL;
}
?>