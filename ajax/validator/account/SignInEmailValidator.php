<?php
class SignInEmailValidator extends AjaxValidator {

    public function validate($params) {
        $valid = true;

        if ($valid) {
            $valid = !empty($_POST['email']);
            if (!$valid) {
                $this->setErrorDescription('empty_email');
            }
        }

        if ($valid) {
            $valid = !empty($_POST['passwd']);
            if (!$valid) {
                $this->setErrorDescription('empty_password');
            }
        }

        return $valid;
    }
}
?>