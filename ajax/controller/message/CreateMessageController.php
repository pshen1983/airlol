<?php
class CreateMessageController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('status'=>0);
        $mapDao = MapTripGoodDao::getDaoByTripAndGood($params['trip_id'], $params['good_id']);

        if (!isset($mapDao)) {
            $mapDao = new MapTripGoodDao();
            $mapDao->setTripId($params['trip_id']);
            $mapDao->setGoodId($params['good_id']);
            if (!$mapDao->save()) {
                $this->setStatusCode(500);
                $atReturn['description'] = 'internal_server_error';
            }
        }

        $messageDao = new MessageDao();
        $messageDao->setTripGoodMapId($mapDao->getId());
        $messageDao->setReceiverId($params['receiver_id']);
        $messageDao->setSenderId(ASession::getSessionUserId());
        $messageDao->setComment($params['text']);
        if ($messageDao->save()) {
            $atReturn['message_id'] = $messageDao->getId();
        } else {
            $this->setStatusCode(500);
            $atReturn['description'] = 'internal_server_error';
        }

        return $atReturn;
    }
}
?>