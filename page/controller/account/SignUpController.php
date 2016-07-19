<?php
class SignUpController extends PageController {
    protected function handle($params) {
        $status = 0;

        if ($this->isPost()) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $passwd = $_POST['password'];
            $passwd2 = $_POST['password2'];

            $validEmail = Format::isValidEmail($email);
            $validPasswd = Format::isValidPassword($passwd);

            if (isset($_POST['agree']) && $_POST['agree']=='agree') {
                if ($passwd == $passwd2) {
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
                            }
                        } else {
                            $status = 2;
                        }
                    } else if (!$validEmail) {
                        $status = 3;
                    } else if (!$validPasswd) {
                        $status = 4;
                    }
                } else {
                    $status = 5;
                }
            } else {
                $status = 6;
            }
        }

        View::addJs('account.js');
        View::addCss('account.css');

        View::factory('account/signup', array('status'  => $status));
    }

// ===================================================================================================================

    protected function getTitle() {
        switch ($this->getLocale()) {
            case 'zh-cn':
                return "AirLoL | 注册账户";
            case 'zh-tw':
                return "AirLoL | 註冊賬戶";
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
                    'email_label' => '邮箱',
                    'passwd_label' => '密码（6位以上长度）',
                    'passwd2_label' => '确认密码',
                    'name_label' => '姓名',
                    'agree_label' => '同意',
                    'terms_link' => '网站服务条款',
                    'has_label' => '已注册 AirLoL 账户？',
                    'signin_link' => '立即登入',
                    'submit_btn' => '注册',
                    'status_msg' => array(
                        1 => '* 系统错误，暂时无法注册，请稍后再试。',
                        2 => '* 用户邮箱已注册，<a href="/login">马上登入</a>',
                        3 => '* 用户邮箱格式有误。',
                        4 => '* 密码格式有误。',
                        5 => '* 两次输入的密码不同。',
                        6 => '* 请阅读并同意 AirLoL 的网站服务条款。'));
                break;
            case 'zh-tw':
                $rv = array(
                    'regi_label' => '註冊 AirLoL',
                    'email_label' => '郵箱',
                    'passwd_label' => '密碼（6位以上長度）',
                    'passwd2_label' => '確認密碼',
                    'name_label' => '姓名',
                    'agree_label' => '同意',
                    'terms_link' => '網站服務條款',
                    'has_label' => '已註冊 AirLoL 賬戶？',
                    'signin_link' => '立即登入',
                    'submit_btn' => '註冊',
                    'status_msg' => array(
                        1 => '* 系統錯誤，暫時無法註冊，請稍後再試。',
                        2 => '* 用戶郵箱已註冊，<a href="/login">馬上登入</a>',
                        3 => '* 用戶郵箱格式有誤。',
                        4 => '* 密碼格式有誤。',
                        5 => '* 兩次輸入的密碼不同。',
                        6 => '* 請閱讀並同意 AirLoL 的網站服務條款。'));
                break;
            default:
                $rv = array(
                    'regi_label' => 'Sign up for AirLoL',
                    'email_label' => 'Email',
                    'passwd_label' => 'Password (at least 6 characters)',
                    'passwd2_label' => 'Confirm Password',
                    'name_label' => 'Name',
                    'agree_label' => 'I agree to AirLoL\'s ',
                    'terms_link' => 'Terms & Privacy',
                    'has_label' => 'Already have AirLoL account? ',
                    'signin_link' => 'Sign in now',
                    'submit_btn' => 'Submit',
                    'status_msg' => array(
                        1 => '* System Error, please try again later.',
                        2 => '* Email already exist, <a href="/login">Sign in now</a>',
                        3 => '* Invalid Email format.',
                        4 => '* Invalid Password format.',
                        5 => '* Two Passwords entered are not the same.',
                        6 => '* Please read and agree to AirLoL\'s Terms & Privacy.'));
        }

        return $rv;
    }
}
?>