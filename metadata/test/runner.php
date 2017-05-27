<?php
$ch = curl_init();
$params = array();
$result = true;

function checkResult() {
	global $result;
	if ($result) {
		echo '   -   '.chr(27).'[0;32mPASS'.chr(27).'[0m'.PHP_EOL;
	} else {
		echo '   -   '.chr(27).'[0;31mFAIL'.chr(27).'[0m'.PHP_EOL;
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