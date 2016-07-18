<?php
class ForgetPasswordController extends PageController {
    protected function handle($params) {
        $status = null;

        View::addJs('account.js');
        View::addCss('account.css');

        if ($this->isPost()) {
            $email = $_POST['email'];

            $validEmail = Format::isValidEmail($email);

            if ($validEmail) {
                $answer = $_POST['captcha'];
                $index = ASession::get('forget_captcha');

                if ($answer == Captcha::getAnswer($index)) {
                    $userDao = UserDao::getUserByEmail($email);

                    if ($userDao) {
                        $name = $userDao->getName();
                        $token = $this->resetPassword($email);

                        Mailer::sendResetPasswordEmail($email, $name, $token);
                        $status = 0;
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

        $index = rand(1, 20);
        ASession::set('forget_captcha', $index);
        $imgData = Captcha::getBase64Image($index);

        View::factory('account/forgetpassword', array('status'  => $status, 'captcha' => $imgData) );
    }

    protected function getTitle() {
        switch ($this->getLocale()) {
            case 'zh-cn':
                return "";
            case 'zh-tw':
                return "";
            default:
                return "AirLoL | Forget Password";
        }
    }

    protected function getContent() {
        $rv = array();

        switch ($this->getLocale()) {
            case 'zh-cn':
                $rv = array('title_label' => '发送找回密码连接',
                            'email_label' => '邮箱',
                            'value_label' => '（输入结果确认要找回密码）',
                            'has_label' => '已注册 AirLoL 账户？',
                            'signin_link' => '立即登入',
                            'submit'  => '发送',
                            'status_msg' => array(
                                0 => '✓ 重置密码邮件已发送，请查看邮箱。',
                                1 => '* 用户邮箱不存在，<a href="/register">马上注册</a>',
                                2 => '* 输入计算结果有误，请重试。',
                                3 => '* 用户邮箱格式有误，请重试。'));
                break;
            case 'zh-tw':
                $rv = array('title_label' => '發送找回密碼連接',
                            'email_label' => '郵箱',
                            'value_label' => '（輸入結果確認要找回密碼）',
                            'has_label' => '已註冊 AirLoL 賬戶？',
                            'signin_link' => '立即登入',
                            'submit'  => '發送');
                break;
            default:
                $rv = array('title_label' => 'Send Reset Password Link',
                            'email_label' => 'Email',
                            'value_label' => '( Enter result to verify action )',
                            'has_label' => 'Already have AirLoL account? ',
                            'signin_link' => 'Sign in now',
                            'submit'  => 'Send');

        }

        return $rv;
    }

    private function resetPassword($email) {
        $key = md5($email);
        $token = Utility::generateToken(64);
        $value = array('email'=>$email, 'token'=>$token);
        Cacher::instance()->set($key, $value);

        return $token;
    }
}
?>