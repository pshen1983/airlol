<?php
class UserSigninValidator extends AjaxValidator {

    public function validate($params) {
        $valid = true;

        if ($valid) {
            $valid = Format::isValidEmail($_POST['email']);
            if (!$valid) {
                $this->setErrorDescription('invalid_email_format');
            }
        }

        if ($valid) {
            $userDao = UserDao::getUserByEmail($email);
            $valid = isset($userDao) && $userDao->isFromDB();
            if (!$valid) {
                $this->setErrorDescription('user_not_found');
            }
        }

        return $valid;
    }
}
?>