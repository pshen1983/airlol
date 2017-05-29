<?php
class CreateMessageValidator extends AjaxValidator {

    public function validate(& $params) {
        $valid = true;

        if ($valid) {
            $valid = ASession::isSignedIn();
            if (!$valid) {
                $this->setErrorDescription('not_signed_in');
            }
        }

        if ($valid) {
            $valid = $params['good_id'] && $params['trip_id'] && $params['text'] && $params['receiver_id'];
            if (!$valid) {
                $this->setErrorDescription('invalid_post_params');
            }
        }

        if ($valid) {
            $valid = ASession::getSessionUserId()!=$params['receiver_id'];
            if (!$valid) {
                $this->errorStatusCode = 409;
                $this->setErrorDescription('conflict_ids');
            }
        }

        return $valid;
    }

    protected function getErrorCode() {
        return 400;
    }
}
?>