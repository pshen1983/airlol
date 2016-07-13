<?php
class SignUpController extends PageController {
    protected function handle($params) {
        $status = 0;
        $message = '';

        if ($this->isPost()) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $passwd = $_POST['password'];
            $passwd2 = $_POST['password2'];

            $validEmail = Format::isValidEmail($email);
            $validPasswd = Format::isValidPassword($passwd);

            if ($passwd == $password2) {
                if ($validEmail && $validPasswd) {
                    $emailExist = UserDao::existEmail($email);
                    if (!$emailExist) {
                        $user = new UserDao();
                        $user->setName($name);
                        $user->setEmail($email);
                        $user->setPassword($passwd);
                        if ($user->save()) {
                            ASession::setSessionUserId($user->getId());
                            Mailer::sendSignupWelcomeEmail($email, $name);

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
                } else if ($validEmail) {
                    $status = 3;
                    $message = '';
                } else if ($validPasswd) {
                    $status = 4;
                    $message = '';
                } else {
                    $status = 5;
                    $message = '';
                }
            } else {
                $status = 6;
                $message = '';
            }
        }

        View::addJs('account.js');
        View::addCss('account.css');

        View::factory('account/signup', 
            array('submit'  => 'register',
                  'status'  => $status,
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
                return "AirLoL | Sign up";
        }
    }

    protected function getContent() {
        $rv = array();

        switch ($this->getLocale()) {
            case 'zh-cn':
                $rv = array(
                    'regi_label' => '注册 AirLoL',
                    'email_label' => '邮箱：',
                    'passwd_label' => '密码：',
                    'name_label' => '姓名：',
                    'agree_label' => '同意',
                    'terms_link' => '網站服務條款',
                    'has_label' => '已注册 AirLoL 账户？',
                    'signin_link' => '立即登入',
                    'submit_btn' => '注册');
                break;
            case 'zh-tw':
                $rv = array(
                    'regi_label' => '註冊 AirLoL',
                    'email_label' => '郵箱：',
                    'passwd_label' => '密碼：',
                    'name_label' => '姓名：',
                    'agree_label' => '同意',
                    'terms_link' => '網站服務條款',
                    'has_label' => '已註冊 AirLoL 賬戶？',
                    'signin_link' => '立即登入',
                    'submit_btn' => '註冊');
                break;
            default:
                $rv = array(
                    'regi_label' => 'Sign up for AirLoL',
                    'email_label' => 'Email:',
                    'passwd_label' => 'Password:',
                    'name_label' => 'Name:',
                    'agree_label' => 'I agree to AirLoL\'s ',
                    'terms_link' => 'Terms & Privacy',
                    'has_label' => 'Already have AirLoL account? ',
                    'signin_link' => 'Sign in now',
                    'submit_btn' => 'Submit');
        }

        return $rv;
    }
}
?>