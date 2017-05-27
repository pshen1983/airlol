<?php
class TripTester extends Tester {

	public static function searchTrips($departure, $arrival, $date, $page, $whole_bag) {

		global $ch; echo get_called_class().'::'.__FUNCTION__.'()';

		$url = 'http://localhost/ajax/search/goods?departure='.$departure
												.'&arrival='.$arrival
												.'&date='.$date
												.'&page='.$page;
		if (isset($whole_bag)) {
			$url.='&whole_bag='.$whole_bag;
		}

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, false);

		$res = self::getResult();

		return $res;
	}

	public static function getUserTrips() {
		global $ch; echo get_called_class().'::'.__FUNCTION__.'()';

		curl_setopt($ch, CURLOPT_URL, 'http://localhost/ajax/trip/user/list');
		curl_setopt($ch, CURLOPT_POST, false);

		$res = self::getResult();

		return $res;
	}
}
?>