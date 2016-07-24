<?php
class SignInController extends PageController {
    protected function handle($params) {
        $status = 0;
        $message = '';

        if (ASession::isSignedIn()) {
            $this->redirect('/');
        }

        if ($this->isPost()) {
            $email = $_POST['email'];
            $passwd = $_POST['password'];

            $validEmail = Format::isValidEmail($email);
            if ($validEmail) {
                $user = UserDao::getUserByEmail($email);
                if ($user) {
                    $validPasswd = $user->checkPassword($passwd);
                    if ($validPasswd) {
                        ASession::setSessionUserId($user->getId());

                        if (isset($_POST['remember']) && $_POST['remember']=='remember') {
                            $this->saveRememberMeCookie();
                        }

                        if (!empty($_POST['redirect_uri'])) {
                            $this->redirect(urldecode($_POST['redirect_uri']));
                        } else {
                            $this->redirect('/');
                        }
                    } else {
                        $status = 1;
                    }
                } else {
                    $status = 2;
                }
            } else {
                $status = 3;
            }
        }

        if (isset($_GET['e'])) {
            $gEmail = urldecode($_GET['e']);
        }

        if (isset($_GET['redirect_uri']) || isset($_POST['redirect_uri'])) {
            $redirectUri = isset($_GET['redirect_uri']) ? $_GET['redirect_uri'] : $_POST['redirect_uri'];
        }

        View::addJs('account.js');
        View::addCss('account.css');

        View::factory('account/signin', array('redirect_uri' => isset($redirectUri) ? $redirectUri : null, 'email' => isset($gEmail) ? $gEmail : null, 'status'  => $status));
    }

// ===================================================================================================================

    protected function getTitle() {
        switch ($this->getLocale()) {
            case 'zh-cn':
                return "AirLoL | 登入";
            case 'zh-tw':
                return "AirLoL | 登入";
            default:
                return "AirLoL | Sign in";
        }
    }


    protected function getContent() {
        $rv = array();

        switch ($this->getLocale()) {
            case 'zh-cn':
                $rv = array(
                    'login_label' => '登入 AirLoL',
                    'email_label' => '邮箱',
                    'passwd_label' => '密码',
                    'remember_me' => '记住密码',
                    'submit_btn' => '登入',
                    'forget_link' => '忘记密码？',
                    'signup_link' => '注册 AirLoL！',
                    'status_msg' => array(
                        1 => '* 用户邮箱与所提供密码不符。',
                        2 => '* 用户邮箱不存在，<a href="/register">马上注册</a>',
                        3 => '* 用户邮箱格式有误，请确认后重试。'));
                break;
            case 'zh-tw':
                $rv = array(
                    'login_label' => '登入 AirLoL',
                    'email_label' => '郵箱',
                    'passwd_label' => '密碼',
                    'remember_me' => '自動登入',
                    'submit_btn' => '登入',
                    'forget_link' => '忘記密碼？',
                    'signup_link' => '註冊 AirLoL！',
                    'status_msg' => array(
                        1 => '* 用戶郵箱與所提供密碼不符。 ',
                        2 => '* 用戶郵箱不存在，<a href="/register">馬上註冊</a>',
                        3 => '* 用戶郵箱格式有誤，請確認後重試。'));
                break;
            default:
                $rv = array(
                    'login_label' => 'Log into AirLoL',
                    'email_label' => 'Email',
                    'passwd_label' => 'Password',
                    'remember_me' => 'remember me',
                    'submit_btn' => 'Submit',
                    'forget_link' => 'Forget Password?',
                    'signup_link' => 'Sign up for AirLoL!',
                    'status_msg' => array(
                        1 => '* Invalid Email and Password Combination.',
                        2 => '* Email not Found. <a href="/register">Sign up for AirLoL now</a>',
                        3 => '* Invalid Email format, please confirm and try again.'));
        }

        return $rv;
    }
}
?>