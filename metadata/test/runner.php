<?php
$ch = curl_init();
$result = true;

include dirname(__FILE__).'/libs/UserTester.php';
include dirname(__FILE__).'/libs/TripTester.php';

if (count($argv)<2) {
	echo 'Usage: "php runner.php 001"'.PHP_EOL;
	exit;
}

include dirname(__FILE__).'/cases/'.$argv[1].'.php';

if ($result) {
	echo "==== Test Successful! ====".PHP_EOL;
}
?>