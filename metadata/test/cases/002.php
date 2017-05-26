<?php
$random = uniqid();

if ($result) $result = UserTester::register("tb_".$random."@cairyme.com", "cairyme0", "Test ".$random);

if ($result) $result = TripTester::getUserTrips();

?>