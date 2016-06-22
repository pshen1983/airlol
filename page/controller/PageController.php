<?php
abstract class PageController {

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

        View::addParam(array('user_session' => $isLogin));

        $pageContent = $this->getContent();
        $headContent = $this->getHeaderContent();
        $content = array_merge($pageContent, $headContent);
        View::setContent($content);

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


    protected function getLocale() {
        if (isset($_COOKIE['locale'])) {
            $lang = $_COOKIE['locale'];
        } else {
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,5);
            if (isset($lang)) {
                $lang = strtolower($lang);
            } else {
                global $default_lang;
                $lang = $default_lang;
            }

            setcookie( 'locale', $lang, time()+31536000, '/', 'airlol.com' );
        }

        return $lang;
    }


    private function getHeaderContent() {
        $rv = array();

        switch ($this->getLocale()) {
            case 'zh-cn':
                $rv = array('btn_header_signin' => '登陆',
                            'btn_header_signup' => '注册',
                            'btn_signin_submit' => '登陆',
                            'btn_send_message' => '发送');
                break;
            case 'zh-tw':
                $rv = array('btn_header_signin' => 'Sign in',
                            'btn_header_signup' => 'Sign up',
                            'btn_signin_submit' => 'Sign in',
                            'btn_send_message' => 'Send');
                break;
            default:
                $rv = array('btn_header_signin' => 'Sign in',
                            'btn_header_signup' => 'Sign up',
                            'btn_signin_submit' => 'Sign in',
                            'btn_send_message' => 'Send');

        }

        return $rv;
    }


    abstract protected function handle($params);
    abstract protected function getContent();
}
?>