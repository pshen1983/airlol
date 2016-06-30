<?php
class ResetPasswordController extends PageController {
    protected function handle($params) {
        $status = 0;
        $message = '';

        $p = '';
        $token = '';

        if (isset($_GET['p'])) {
            $token = Cacher::instance()->get($_GET['p']);

            if ($token) {
                if (isset($_GET['token']) && $token['token']==$_GET['token']) {
                    $p = $_GET['p'];
                    $token = $token['token'];
                } else {
                    $status = 1;
                    $message = '';
                }
            } else {
                $status = 2;
                $message = '';
            }
        }

        if ($this->isPost()) {
            $passwd0 = $_POST['passwd0'];
            $passwd1 = $_POST['passwd1'];

            if ($passwd0==$passwd1) {
                $token = Cacher::instance()->get($_POST['p']);
                if ($token && $_POST['token'] && $token['token']==$_POST['token']) {
                    $userDao = UserDao::getUserByEmail($token['email']);
                    if ($userDao) {
                        $userDao->setPassword($passwd0);
                        if ($userDao->save()) {
                            Cacher::instance()->delete($_POST['p']);
                            $message = '';
                        } else {
                            $status = 3;
                            $message = '';
                        }
                    } else {
                        $status = 4;
                        $message = '';
                    }
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

        View::factory('account/resetpassword',
            array('submit'  => 'Submit',
                  'status'  => $status,
                  'message' => $message,
                  'p' => $p,
                  'token' => $token)
        );
    }

    protected function getTitle() {
        switch ($this->getLocale()) {
            case 'zh-cn':
                return "";
            case 'zh-tw':
                return "";
            default:
                return "AirLoL | Reset Password";
        }
    }

    protected function getContent() {
        $rv = array();

        switch ($this->getLocale()) {
            case 'zh-cn':
                $rv = array();
                break;
            case 'zh-tw':
                $rv = array();
                break;
            default:
                $rv = array();

        }

        return $rv;
    }
}
?>