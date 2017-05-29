<?php
class MessageTester extends Tester {

	public static function createMessage($tripId, $goodId, $receiverId, $text) {
		global $ch, $host; echo get_called_class().'::'.__FUNCTION__.'()';

		$request = array('trip_id'     => $tripId,
						 'good_id'     => $goodId,
						 'receiver_id' => $receiverId,
						 'text'        => $text);

		curl_setopt($ch, CURLOPT_URL, $host.'/message');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));

		$res = self::getResult();

		return $res;
	}


	public static function getTripGoodMessages($tripId, $goodId, $page) {
		global $ch, $host; echo get_called_class().'::'.__FUNCTION__.'()';

		$url = $host.'/message/'.$tripId.'/'.$goodId.'?page='.$page;

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, false);

		$res = self::getResult();

		return $res;
	}
}
?>