<?php
if ($result) $result = UserTester::login("tb_001_user_0001@cairyme.com", "cairyme0");

if ($result) $result = TripTester::getUserTrips();

?>