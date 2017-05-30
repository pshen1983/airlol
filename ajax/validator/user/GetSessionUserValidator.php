<?php
class GetSessionUserValidator extends AjaxValidator {

    public function validate(& $params) {
        $valid = true;

        if ($valid) {
            $this->cookieLogin();
            $valid = ASession::isSignedIn();
            if (!$valid) {
                $this->errorStatusCode = 401;
                $this->setErrorDescription('not_signed_in');
            }
        }

        return $valid;
    }

    private function cookieLogin() {
        $token = $_COOKIE['REMEMBERME'];
        if ($token) {
            $cookieTokenDao = CookieTokenDao::getRememberMeTokenByValue($token);
            if ($cookieTokenDao) {
                ASession::setSessionUserId($cookieTokenDao->getUserId());
            }
        }
    }
}
?>