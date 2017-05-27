<?php

if ($result) {
	$status = AccountTester::login("tb_001_user_0001@cairyme.com", "cairyme0");
	$result = $status=='success';
}

checkResult();

if ($result) {
	$res = TripTester::getUserTrips();
	$result = isset($res['past']);
}

checkResult();

?>