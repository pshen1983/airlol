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

                        $this->redirect('/');
                    } else {
                        $status = 1;
                        $message = '';
                    }
                } else {
                    $status = 2;
                    $message = '';
                }
            } else {
                $status = 3;
                $message = '';
            }
        }

        View::addJs('account.js');
        View::addCss('account.css');

        View::factory('account/signin',
            array('status'  => $status,
                  'message' => $message)
        );
    }

    protected function getTitle() {
        switch ($this->getLocale()) {
            case 'zh-cn':
                return "";
            case 'zh-tw':
                return "";
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
                    'signup_link' => '注册 AirLoL！');
                break;
            case 'zh-tw':
                $rv = array(
                    'login_label' => '登入 AirLoL',
                    'email_label' => '郵箱',
                    'passwd_label' => '密碼',
                    'remember_me' => '自動登入',
                    'submit_btn' => '登入',
                    'forget_link' => '忘記密碼？',
                    'signup_link' => '註冊 AirLoL！');
                break;
            default:
                $rv = array(
                    'login_label' => 'Log into AirLoL',
                    'email_label' => 'Email',
                    'passwd_label' => 'Password',
                    'remember_me' => 'remember me',
                    'submit_btn' => 'Submit',
                    'forget_link' => 'Forget Password?',
                    'signup_link' => 'Sign up for AirLoL!');

        }

        return $rv;
    }
}
?>