<?php
class GoodTester extends Tester {

	public static function search($departure, $arrival, $date, $page, $whole_bag=null) {
		global $ch, $host; echo get_called_class().'::'.__FUNCTION__.'()';

		$url = $host.'/search/goods?departure='.$departure
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

}
?>