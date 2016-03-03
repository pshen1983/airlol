<?php
class CreateMessageController extends AjaxController {

    protected function handle($params) {
        $status = 0;
        $message = '';

        if (ASession::isSignedIn()) {
            $msg = $_POST['msg'];
            $goodId = $_POST['gid'];
            $tripId = $_POST['tid'];
            $contextType = $_POST['context'];

            // 1 - trip and 0 - good
            $context = null;
            if ($contextType==1) {
                $context = new TripDao($tripId);
            } else if ($contextType==0) {
                $context = new GoodDao($goodId);
            }

            if (isset($context)) {
                $toId = $context->getUserId();
                $fromId = ASession::getSessionUserId();

                $messageDao = new MessageDao();
                $messageDao->setTripId($tripId);
                $messageDao->setGoodId($goodId);
                $messageDao->setSender($fromId);
                $messageDao->setReceiver($toId);
                $messageDao->setComment($msg);

                if (!$messageDao->save()) {
                    $status = 1;
                    $message = 'cannot_process';
                }
            } else {
                $status = 2;
                $message = 'missing_context';
            }
        }
    }

    private function sendEmail($email, $message) {

    }
}
?>