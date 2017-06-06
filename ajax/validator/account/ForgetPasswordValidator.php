<?php
class ForgetPasswordValidator extends AjaxValidator {

    public function validate(& $params) {
        $valid = true;

        if ($valid) {
            $valid = !empty($params['email']);
            if (!$valid) {
                $this->setErrorDescription('empty_email');
            }
        }

        if ($valid) {
            $valid = !empty($params['recaptcha']);
            if (!$valid) {
                $this->setErrorDescription('empty_recaptcha');
            }
        }

        if ($valid) {
            $valid = Format::isValidEmail($params['email']);
            if (!$valid) {
                $this->setErrorDescription('invalid_email_format');
            }
        }

        return $valid;
    }

    protected function getErrorCode() {
        return 400;
    }
}
?>