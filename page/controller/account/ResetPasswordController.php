<?php
class ResetPasswordController extends PageController {
    protected function handle($params) {
        $status = 0;

        $p = isset($_GET['p']) ? $_GET['p'] : $_POST['p'];
        $tokenIn = isset($_GET['token']) ? $_GET['token'] : $_POST['token'];

        if (isset($p)) {
            $token = Cacher::instance()->get($p);

            if ($token) {
                if (isset($tokenIn) && $token['token']==$tokenIn) {
                    $token = $token['token'];
                } else {
                    $status = 1;
                }
            } else {
                $status = 2;
            }
        }

        if ($this->isPost()) {
            $passwd0 = $_POST['passwd0'];

            $validPasswd = Format::isValidPassword($passwd0);
            if ($validPasswd) {
                $passwd1 = $_POST['passwd1'];

                if ($passwd0==$passwd1) {
                    $token = Cacher::instance()->get($_POST['p']);
                    if ($token && $_POST['token'] && $token['token']==$_POST['token']) {
                        $userDao = UserDao::getUserByEmail($token['email']);
                        if ($userDao) {
                            $userDao->setPassword($passwd0);
                            if ($userDao->save()) {
                                Cacher::instance()->delete($_POST['p']);
                                $this->redirect('/login?e='.urlencode($token['email']));
                            } else {
                                $status = 3;
                            }
                        } else {
                            $status = 4;
                        }
                    } else {
                        $status = 5;
                    }
                } else {
                    $status = 6;
                }
            } else {
                $status = 7;
            }
        }

        View::addJs('account.js');
        View::addCss('account.css');

        View::factory('account/resetpassword', array('status'  => $status, 'p' => $p, 'token' => $token));
    }

// ===================================================================================================================

    protected function getTitle() {
        switch ($this->getLocale()) {
            case 'zh-cn':
                return "AirLoL | 重置密码";
            case 'zh-tw':
                return "AirLoL | 重置密碼";
            default:
                return "AirLoL | Reset Password";
        }
    }


    protected function getContent() {
        $rv = array();

        switch ($this->getLocale()) {
            case 'zh-cn':
                $rv = array('reset_label' => '密码重置',
                            'passwd0_label' => '新密码（6位以上长度）',
                            'passwd1_label' => '再次输入密码',
                            'submit_label' => '确定',
                            'status_msg' => array(
                                1 => '* 系统错误，暂时无法重置密码，请稍后再试。',
                                2 => '* 重置密码连接超时，<a href="/forget-password">重新发送</a>',
                                3 => '* 系统错误，暂时无法重置密码，请稍后再试。',
                                4 => '* 用户邮箱不存在，<a href="/register">马上注册</a>',
                                5 => '* 重置密码连接超时，<a href="/forget-password">重新发送</a>',
                                6 => '* 两次输入的密码不同。',
                                7 => '* 输入的密码格式有误，请重试。'));
                break;
            case 'zh-tw':
                $rv = array('reset_label' => '密碼重置',
                            'passwd0_label' => '新密碼（6位以上長度）',
                            'passwd1_label' => '再次輸入密碼',
                            'submit_label' => '確定',
                            'status_msg' => array(
                                1 => '* 系統錯誤，暫時無法重置密碼，請稍後再試。',
                                2 => '* 重置密碼連接超時，<a href="/forget-password">重新發送</a>',
                                3 => '* 系統錯誤，暫時無法重置密碼，請稍後再試。',
                                4 => '* 用戶郵箱不存在，<a href="/register">馬上註冊</a>',
                                5 => '* 重置密碼連接超時，<a href="/forget-password">重新發送</a>',
                                6 => '* 兩次輸入的密碼不同。',
                                7 => '* 輸入的密碼格式有誤，請重試。'));
                break;
            default:
                $rv = array('reset_label' => 'Reset Password',
                            'passwd0_label' => 'New Password (at least 6 characters)',
                            'passwd1_label' => 'Re-enter Password',
                            'submit_label' => 'Submit',
                            'status_msg' => array(
                                1 => '* System Error, please try again later.',
                                2 => '* Email link has expired, <a href="/forget-password">send link again</a>',
                                3 => '* System not available, please try again later.',
                                4 => '* Email does NOT exist. <a href="/register">Register now</a>',
                                5 => '* Email link has expired, <a href="/forget-password">send link again</a>',
                                6 => '* Two Passwords entered are not the same.',
                                7 => '* Invalid Password format, please try again.'));

        }

        return $rv;
    }
}
?>