<?php
class RateUserController extends AjaxController {

    protected function handle($params) {
        $status = 0;
        $message = '';

        if (ASession::isSignedIn()) {

        } else {
            $status = 3;
            $message = '';
        }

        return array('status'=>$status, 'message'=>$message);
    }
}
?>