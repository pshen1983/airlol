<?php
class GetTripGoodMessagesCountroller extends AjaxController {

    protected function handle($params) {
    	$messages = array();

    	$mapDao = MapTripGoodDao::getDaoByTripAndGood($params['tripid'], $params['goodid']);

		global $message_size;
		$start = ($_GET['page']-1)*$message_size;
    	$messageDaos = MessageDao::getTripGoodMessages($mapDao->getId(), $start);

        // update the last read time
        $mapDao->setLastRead(date("Y-m-d H:i:s"));
        $mapDao->save();

    	foreach ($messageDaos as $messageDao) {
    		$message = array();
    		$message['sender_id'] = $messageDao->getSenderId();
    		$message['receiver_id'] = $messageDao->getReceiverId();
    		$message['text'] = $messageDao->getComment();

            $createTime  = strtotime($messageDao->getCreateTime());
            $nowTime = strtotime('now');

    		$message['ago_second'] = $nowTime-$createTime;
    		$messages[] = $message;
    	}

    	return $messages;
    }
}
?>