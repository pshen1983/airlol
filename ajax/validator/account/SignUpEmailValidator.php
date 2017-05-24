<?php
class SignUpEmailValidator extends AjaxValidator {

    public function validate(& $params) {
        $valid = true;

        if ($valid) {
            $valid = !empty($params['email']);
            if (!$valid) {
                $this->setErrorDescription('empty_email');
            }
        }

        if ($valid) {
            $valid = Format::isValidEmail($params['email']);
            if (!$valid) {
                $this->setErrorDescription('invalid_email_format');
            }
        }

        if ($valid) {
            $valid = !UserDao::existEmail($params['email']);
            if (!$valid) {
                $this->setErrorDescription('email_already_exist');
            }
        }

        if ($valid) {
            $valid = !empty($params['passwd']);
            if (!$valid) {
                $this->setErrorDescription('empty_password');
            }
        }

        if ($valid) {
            $valid = !empty($params['passwd1']);
            if (!$valid) {
                $this->setErrorDescription('empty_password1');
            }
        }

        if ($valid) {
            $valid = $params['passwd']==$params['passwd1'];
            if (!$valid) {
                $this->setErrorDescription('passwords_not_match');
            }
        }

        if ($valid) {
            $valid = Format::isValidPassword($params['passwd']);
            if (!$valid) {
                $this->setErrorDescription('invalid_password_format');
            }
        }

        if ($valid) {
            $valid = !empty($params['name']);
            if (!$valid) {
                $this->setErrorDescription('empty_name');
            }
        }

        return $valid;
    }

    protected function getErrorCode() {
        return 400;
    }
}
?>