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

        View::addJs('user.js');
        View::addCss('user.css');

        View::factory('user/resetpassword',
            array('submit'  => 'Submit',
                  'status'  => $status,
                  'message' => $message,
                  'p' => $p,
                  'token' => $token)
        );
    }
}
?>