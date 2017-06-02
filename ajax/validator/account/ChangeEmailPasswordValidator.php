<?php
class ChangeEmailPasswordValidator extends AjaxValidator {

    public function validate(& $params) {
        $valid = true;

        if ($valid) {
            $valid = ASession::isSignedIn();
            if (!$valid) {
                $this->errorStatusCode = 401;
                $this->setErrorDescription('not_signed_in');
            }
        }

        if ($valid) {
            $valid = !empty($params['password']);
            if (!$valid) {
                $this->setErrorDescription('empty_password');
            }
        }

        if ($valid) {
            $valid = !empty($params['password_confirm']);
            if (!$valid) {
                $this->setErrorDescription('empty_password_confirm');
            }
        }

        if ($valid) {
            $valid = $params['password']==$params['password_confirm'];
            if (!$valid) {
                $this->setErrorDescription('passwords_not_match');
            }
        }

        if ($valid) {
            $valid = Format::isValidPassword($params['password']);
            if (!$valid) {
                $this->setErrorDescription('invalid_password_format');
            }
        }

        if ($valid) {
            $userId = ASession::getSessionUserId();
            $userDao = new UserDao($userId);
            $valid = !$userDao->checkPassword($params['password']);
            if (!$valid) {
                $this->setErrorDescription('same_as_old');
            } else {
                $params['user_dao'] = $userDao;
            }
        }

        return $valid;
    }

    protected function getErrorCode() {
        return 400;
    }
}
?>