<?php
abstract class PageController {

    public function execute($params) {
        $isLogin = ASession::isSignedIn();
        $locale = $this->getLocale();

        if (!$isLogin && isset($_COOKIE['REMEMBERME'])) {
            $this->cookieLogin();
            $isLogin = ASession::isSignedIn();
        }

        if ($this->isAuthenticatedPage() && !$isLogin) {
            $this->redirect('/login?redirect_uri='.urlencode($_SERVER['REQUEST_URI']));
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

    private function cookieLogin() {
        $token = $_COOKIE['REMEMBERME'];
        $cookieTokenDao = CookieTokenDao::getRememberMeTokenByValue($token);
        if ($cookieTokenDao) {
            ASession::setSessionUserId($cookieTokenDao->getUserId());
        }
    }

    protected function isPost() {
        return $_SERVER['REQUEST_METHOD']=='POST';
    }


    protected function redirect($url, $exit=true) {
        header('Location: '.$url);
        if ($exit) { exit; }
    }


    protected function getLocale($isDBLocale=false) {
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

        if ($isDBLocale) {
            $lang = substr($lang, 0, 2);
        }

        return $lang;
    }

    protected function getCmsLocale() {
        $lang = $this->getLocale();
        return substr($lang, 0, 2);
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
            global $base_url;
            $profileImage = 'http://'.$base_url.'/user/'.ASession::getSessionUserId().'/profile/image';
        }
        View::addParam(array('header_user_pic' => $profileImage));
    }


    private function getHeaderFooterContent() {
        $rv = array();

        switch ($this->getLocale()) {
            case 'zh-cn':
                $rv = array('btn_header_signinup' => '登入 / 注册',
                            'btn_header_message' => '消息',
                            'btn_header_history' => '我的历史',
                            'a_header_profile' => '编辑个人资料',
                            'a_header_setting' => '帐号设定',
                            'a_header_guildbook' => '指南',
                            'a_header_signout' => '登出',
                            'btn_send_message' => '发送',
                            'lable_footer_language' => '语言',
                            'lable_footer_company' => '公司',
                            'a_footer_about' => '公司概况',
                            'a_footer_career' => '加入我们',
                            'a_footer_feedback' => '意见反馈',
                            'a_footer_contact' => '联系我们',
                            'a_footer_terms' => '服務和隐私條款',
                            'label_footer_traveller' => '行李空位',
                            'a_footer_whyshare' => '为什么分享空位',
                            'a_footer_carrying' => '分享之道',
                            'a_footer_responsible' => '分享义务',
                            'a_footer_add' => '添加行李空位',
                            'label_footer_sender' => '委托物品',
                            'a_footer_what2send' => '什么物品适合委托',
                            'a_footer_sending' => '委托之道',
                            'a_footer_receiving' => '接收注意',
                            'a_footer_quicksearch' => '找空位');
                break;
            case 'zh-tw':
                $rv = array('btn_header_signinup' => '登入 / 注册',
                            'btn_header_message' => '消息',
                            'btn_header_history' => '我的歷史',
                            'a_header_profile' => '編輯資料',
                            'a_header_setting' => '帳號設定',
                            'a_header_guildbook' => '指南',
                            'a_header_signout' => '退出',
                            'btn_send_message' => '發送',
                            'lable_footer_language' => '語言',
                            'lable_footer_company' => '公司',
                            'a_footer_about' => '公司概況',
                            'a_footer_career' => '加入我們',
                            'a_footer_feedback' => '意見反饋',
                            'a_footer_contact' => '聯繫我們',
                            'a_footer_terms' => '服務和隱私條款',
                            'label_footer_traveller' => '行李空位',
                            'a_footer_whyshare' => '為什麼分享空位',
                            'a_footer_carrying' => '分享之道',
                            'a_footer_responsible' => '分享義務',
                            'a_footer_add' => '添加行李空位',
                            'label_footer_sender' => '委託物品',
                            'a_footer_what2send' => '什麼物品適合委託',
                            'a_footer_sending' => '委託之道',
                            'a_footer_receiving' => '接收注意',
                            'a_footer_quicksearch' => '找空位');
                break;
            default:
                $rv = array('btn_header_signinup' => 'Login / Sign up',
                            'btn_header_message' => 'Message',
                            'btn_header_history' => 'History',
                            'a_header_profile' => 'Edit Profile',
                            'a_header_setting' => 'Account Settings',
                            'a_header_guildbook' => 'My Guidebook',
                            'a_header_signout' => 'Sign out',
                            'btn_send_message' => 'Send',
                            'lable_footer_language' => 'Language',
                            'lable_footer_company' => 'Company',
                            'a_footer_about' => 'About',
                            'a_footer_career' => 'Career',
                            'a_footer_feedback' => 'Feedback',
                            'a_footer_contact' => 'Contact',
                            'a_footer_terms' => 'Terms & Privacy',
                            'label_footer_traveller' => 'Traveller',
                            'a_footer_whyshare' => 'Why Share',
                            'a_footer_carrying' => 'Carrying Tips',
                            'a_footer_responsible' => 'Responsible Share',
                            'a_footer_add' => 'Add a Trip',
                            'label_footer_sender' => 'Sender',
                            'a_footer_what2send' => 'What to Send',
                            'a_footer_sending' => 'Sending Tips',
                            'a_footer_receiving' => 'Receiving',
                            'a_footer_quicksearch' => 'Quick Search');

        }

        return $rv;
    }


    protected function getContent() { return array(); }
    protected function getTitle() { return ''; }
    protected function isAuthenticatedPage() { return false; }

    abstract protected function handle($params);
}
?>