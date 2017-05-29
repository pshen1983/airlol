<?php
class TripTester extends Tester {

	public static function search($departure, $arrival, $date, $page, $whole_bag=null) {
		global $ch, $host; echo get_called_class().'::'.__FUNCTION__.'()';

		$url = $host.'/search/trips?departure='.$departure
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


	public static function createTrip($departure, $arrival, $date, $space_type, $price, $currency, $searchable, $weight=null, $weight_unit=null) {
		global $ch, $host; echo get_called_class().'::'.__FUNCTION__.'()';

		$request = array('departure'  => $departure,
						 'arrival'    => $arrival,
						 'date'       => $date,
						 'space_type' => $space_type,
						 'price'      => $price,
						 'currency'   => $currency,
						 'searchable' => $searchable);
		if (isset($weight)) $request['weight'] = $weight;
		if (isset($weight_unit)) $request['weight_unit'] = $weight_unit;

		curl_setopt($ch, CURLOPT_URL, $host.'/trip');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));

		$res = self::getResult();

		return $res;
	}


	public static function getUserTrips() {
		global $ch, $host; echo get_called_class().'::'.__FUNCTION__.'()';

		curl_setopt($ch, CURLOPT_URL, $host.'/trip/user/list');
		curl_setopt($ch, CURLOPT_POST, false);

		$res = self::getResult();

		return $res;
	}


	public static function getTripGoods($tripId) {
		global $ch, $host; echo get_called_class().'::'.__FUNCTION__.'()';

		curl_setopt($ch, CURLOPT_URL, $host.'/trip/'.$tripId.'/goods');
		curl_setopt($ch, CURLOPT_POST, false);

		$res = self::getResult();

		return $res;
	}
}
?>