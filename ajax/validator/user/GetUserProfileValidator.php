<?php
class GetUserProfileValidator extends AjaxValidator {

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
            $userDao = new UserDao($params['userid']);
            $valid = $userDao->isFromDB();
            $params['user_dao'] = $userDao;
            if (!$valid) {
                $this->errorStatusCode = 404;
                $this->setErrorDescription('user_not_found');
            }
        }

        return $valid;
    }
}
?>