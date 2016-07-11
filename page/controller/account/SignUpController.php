<?php
class SignUpController extends PageController {
    protected function handle($params) {
        $status = 0;
        $message = '';

        if ($this->isPost()) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $passwd = $_POST['password'];

            $validEmail = Format::isValidEmail($email);
            $validPasswd = Format::isValidPassword($passwd);

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
                    'email_label' => '邮箱：',
                    'passwd_label' => '密码：',
                    'name_label' => '姓名：',
                    'remember_me' => '记住密码',
                    'submit_btn' => '注册');
                break;
            case 'zh-tw':
                $rv = array(
                    'email_label' => '郵箱：',
                    'passwd_label' => '密碼：',
                    'name_label' => '姓名：',
                    'remember_me' => '記住密碼',
                    'submit_btn' => '註冊');
                break;
            default:
                $rv = array(
                    'email_label' => 'Email:',
                    'passwd_label' => 'Password:',
                    'name_label' => 'Name:',
                    'remember_me' => 'remember me',
                    'submit_btn' => 'Register');
        }

        return $rv;
    }
}
?>