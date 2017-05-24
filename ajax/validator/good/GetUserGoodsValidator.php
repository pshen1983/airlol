<?php
class GetUserGoodsValidator extends AjaxValidator {

    public function validate(& $params) {
        $valid = true;

        if ($valid) {
            $valid = ASession::isSignedIn();
            if (!$valid) {
                $this->errorStatusCode = 401;
                $this->setErrorDescription('not_signed_in');
            }
        }

        return $valid;
    }
}
?>