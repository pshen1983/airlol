<?php
class UserSigninValidator extends AjaxValidator {

    public function validate($params) {
        $valid = true;

        if ($valid) {
            $valid = Format::isValidEmail($_POST['email']);
            if (!$valid) {
                $this->setErrorMessage('invalid_email_format');
            }
        }

        if ($valid) {
            $userDao = UserDao::getUserByEmail($email);
            $valid = $userDao->isFromDB();
            if (!$valid) {
                $this->setErrorMessage('user_not_found');
            }
        }

        return $valid;
    }
}
?>