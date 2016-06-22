<?php
class SignInController extends PageController {
    protected function handle($params) {
        $status = 0;
        $message = '';

        if (ASession::isSignedIn()) {
            $this->redirect('/index');
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

                        $this->redirect('/index');
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

        View::setTitle('AirLOL | User Sign in');
        View::addJs('account.js');
        View::addCss('account.css');

        View::factory('account/signin',
            array('submit'  => 'register',
                  'status'  => $status,
                  'message' => $message)
        );
    }
}
?>