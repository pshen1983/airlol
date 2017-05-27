<?php
$random = uniqid();

if ($result) {
	$userId = AccountTester::register("tb_".$random."@cairyme.com", "cairyme0", "Test ".$random);
	$result = $userId>0;
}

if ($result) {
	$res = TripTester::getUserTrips();
	$result = isset($res['past']);
}

?>