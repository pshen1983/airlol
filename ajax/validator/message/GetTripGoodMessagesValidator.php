<?php
class GetTripGoodMessagesValidator extends AjaxValidator {

    public function validate(& $params) {
        $valid = true;

        if ($valid) {
            $valid = ASession::isSignedIn();
            if (!$valid) {
                $this->setErrorDescription('not_signed_in');
            }
        }

        if ($valid) {
            $valid = !empty($_GET['page']);
            if (!$valid) {
                $this->setErrorDescription('missing_page');
            }
        }

        return $valid;
    }
}
?>