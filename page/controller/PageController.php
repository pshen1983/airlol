<?php
abstract class PageController {

    private $language = 'en';

    public function execute($params) {
        session_start();

        $isLogin = ASession::isSignedIn();

        if (!$isLogin && isset($_COOKIE['REMEMBERME'])) {
            $this->cookieLogin();
            $isLogin = ASession::isSignedIn();
        }

        if ($isLogin) {
            $userDao = new UserDao(ASession::getSessionUserId());
            View::addParam(array('header_user_name' => $userDao->getName()));
        }

        View::addParam(
            array( 'user_session' => $isLogin,
                   'btn_header_signin' => 'Sign in',
                   'btn_header_signup' => 'Sign up',
                   'btn_signin_submit' => 'Sign in')
        );

        $this->handle($params);
    }

    protected function isPost() {
        return $_SERVER['REQUEST_METHOD']=='POST';
    }

    protected function redirect($url, $exit=true) {
        header('Location: '.$url);
        if ($exit) { exit; }
    }

    protected function saveRememberMeCookie() {
        $token = Utility::generateToken(64);

        $cookieTokenDao = new CookieTokenDao();
        $cookieTokenDao->setUserId(ASession::getSessionUserId());
        $cookieTokenDao->setValue($token);
        $cookieTokenDao->setType(CookieTokenDao::REMEMBER_ME);
        $cookieTokenDao->save();

        setcookie(
            'REMEMBERME',
            $token,
            time() + CookieTokenDao::DURATION*86400,
            '/',
            null,
            false, // TLS-only
            true  // http-only
        );
    }

    private function cookieLogin() {
        $token = $_COOKIE['REMEMBERME'];
        $cookieTokenDao = CookieTokenDao::getRememberMeTokenByValue($token);
        if ($cookieTokenDao) {
            ASession::setSessionUserId($cookieTokenDao->getUserId());
        }
    }

    abstract protected function handle($params);
}
?>