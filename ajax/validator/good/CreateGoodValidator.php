<?php
class CreateGoodValidator extends AjaxValidator {

    public function validate($params) {
        $valid = true;

        if ($valid) {
            $valid = ASession::isSignedIn();
            if (!$valid) {
                $this->setErrorDescription('not_signed_in');
            }
        }

        if ($valid) {
            $valid = !empty($_POST['departure']) && !empty($_POST['arrival']);
            if (!$valid) {
                $this->setErrorDescription('empty_params');
            }
        }

        if ($valid) {
            $valid = Format::isValidMySQLDate($_POST['date'], true);
            if (!$valid) {
                $this->setErrorDescription('invalid_date_format');
            }
        }

        return $valid;
    }
}
?>