<?php
$tripFrom = 'YVR';
$tripTo = 'SHA';
$tripDate = date('Y-m-d');

if ($result) {
	$res = GoodTester::search($tripFrom, $tripTo, $tripDate, 1);
	$params['good_id'] = $res[1]['good']['id'];
	$params['good_user'] = $res[1]['user']['id'];
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

if ($result) {
	$res = TripTester::getTripGoods($params['trip_id']);
	$result = is_array($res);
}
checkResult();

if ($result) {
	$res = MessageTester::createMessage($params['trip_id'], $params['good_id'], $params['good_user'], 'Test Message for trip '.$params['trip_id']);
	$params['message_id'] = $res['message_id'];
	$result = $res['message_id']>0;
}
checkResult();

if ($result) {
	$res = MessageTester::getTripGoodMessages($params['trip_id'], $params['good_id'], 1);
	$result = $res[0]['id']==$params['message_id'];
}
checkResult();


?>