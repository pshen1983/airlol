<?php
class GetUserProfileImageValidator extends AjaxValidator {

    public function validate(& $params) {
        $valid = true;

        if ($valid) {
            $userId = $params['userid'];
            $userDao = new UserDao($userId);
            $valid = $userDao->isFromDB();
            if (!$valid) {
                $this->errorStatusCode = 404;
                $this->setErrorDescription('user_not_found');
            } else {
                $params['profile_image'] = $userDao->getProfileImg();
            }
        }

        return $valid;
    }
}
?>