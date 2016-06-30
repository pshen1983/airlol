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

                        $this->redirect('/index');
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
                return "";
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