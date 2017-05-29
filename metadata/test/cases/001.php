<?php
$tripFrom = 'YVR';
$tripTo = 'SHA';
$tripDate = date('Y-m-d');

if ($result) {
	$res = GoodTester::search($tripFrom, $tripTo, $tripDate, 1);
	$params['good_id'] = $res[0]['good']['id'];
	$result = !empty($res);
}
checkResult();

if ($result) {
	$status = AccountTester::login("tb_001_user_0001@cairyme.com", "cairyme0");
	$result = $status=='success';
}
checkResult();

if ($result) {
	$res = TripTester::createTrip($tripFrom, $tripTo, $tripDate, 1, 45, 'CAD', true, 23, 1);
	$params['trip_id'] = $res['trip_id'];
	$result = $res['trip_id']>0;
}
checkResult();

if ($result) {
	$res = TripTester::getUserTrips();
	$result = isset($res['past']);
}
checkResult();

?>