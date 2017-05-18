<?php
class SignInEmailValidator extends AjaxValidator {

    public function validate($params) {
        $valid = true;

        if ($valid) {
            $valid = !empty($params['email']);
            if (!$valid) {
                $this->setErrorDescription('empty_email');
            }
        }

        if ($valid) {
            $valid = !empty($params['password']);
            if (!$valid) {
                $this->setErrorDescription('empty_password');
            }
        }

        return $valid;
    }

    protected function getErrorCode() {
        return 400;
    }
}
?>