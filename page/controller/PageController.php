<?php
abstract class PageController {

    public function execute($params) {
        session_start();

        $isLogin = ASession::isSignedIn();
        $locale = $this->getLocale();

        if (!$isLogin && isset($_COOKIE['REMEMBERME'])) {
            $this->cookieLogin();
            $isLogin = ASession::isSignedIn();
        }

        if ($isLogin) {
            $this->addUserParams();
        }

        View::addParam(array('current_locale' => $locale));
        View::addParam(array('user_session' => $isLogin));

        $title = $this->getTitle();
        View::setTitle($title);

        $pageContent = $this->getContent();
        $headContent = $this->getHeaderFooterContent();
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

            Utility::setLocaleCookie($lang);
        }

        return $lang;
    }


    private function getHeaderFooterContent() {
        $rv = array();

        switch ($this->getLocale()) {
            case 'zh-cn':
                $rv = array('btn_header_signin' => '登陆',
                            'btn_header_signup' => '注册',
                            'btn_header_message' => '消息',
                            'btn_header_history' => '我的历史',
                            'a_header_profile' => '编辑个人资料',
                            'a_header_setting' => '帐号设定',
                            'a_header_guildbook' => '指南',
                            'a_header_signout' => '登出',
                            'btn_send_message' => '发送');
                break;
            case 'zh-tw':
                $rv = array('btn_header_signin' => 'Sign in',
                            'btn_header_signup' => 'Sign up',
                            'btn_header_message' => 'Message',
                            'btn_header_history' => 'History',
                            'a_header_profile' => '編輯資料',
                            'a_header_setting' => '帳號設定',
                            'a_header_guildbook' => '指南',
                            'a_header_signout' => '退出',
                            'btn_send_message' => 'Send');
                break;
            default:
                $rv = array('btn_header_signin' => 'Sign in',
                            'btn_header_signup' => 'Sign up',
                            'btn_header_message' => 'Message',
                            'btn_header_history' => 'History',
                            'a_header_profile' => 'Edit Profile',
                            'a_header_setting' => 'Account Settings',
                            'a_header_guildbook' => 'My Guidebook',
                            'a_header_signout' => 'Sign out',
                            'btn_send_message' => 'Send');

        }

        return $rv;
    }


    private function addUserParams() {
        $userDao = new UserDao(ASession::getSessionUserId());

        $userName = $userDao->getName();
        $locale = $this->getLocale();
        if ($locale!='zh-cn' && $locale!='zh-tw') {
            $names = explode(' ', $userName);
            $userName = $names[0];
        }
        View::addParam(array('header_user_name' => $userName));

        $profileImage = $userDao->getProfileImg();
        if (empty($profileImage)) {
            global $default_profile_img;
            $profileImage = $default_profile_img;
        }
        View::addParam(array('header_user_pic' => $profileImage));
    }


    abstract protected function handle($params);

    abstract protected function getContent();
    abstract protected function getTitle();
}
?>