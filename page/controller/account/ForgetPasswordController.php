<?php
class ForgetPasswordController extends PageController {
    protected function handle($params) {
        $status = 0;
        $message = '';

        View::addJs('account.js');
        View::addCss('account.css');

        $index = rand(1, 20);
        ASession::set('forget_captcha', $index);
        $imgData = Captcha::getBase64Image($index);

        if ($this->isPost()) {
            $email = $_POST['email'];

            $validEmail = Format::isValidEmail($email);
            if ($validEmail) {
                $userDao = UserDao::getUserByEmail($email);
                if ($userDao) {
                    $name = $userDao->getName();
                    $token = $this->resetPassword($email);

                    Mailer::sendResetPasswordEmail($email, $name, $token);

                    $status = 1;
                    $message = '';
                } else {
                    $status = 2;
                    $message = '';
                }
            } else {
                $status = 3;
                $message = '';
            }

            View::factory('account/forgetpassword',
                array('status'  => $status,
                      'message' => $message,
                      'captcha' => $imgData)
            );
        } else {

            View::factory('account/forgetpassword',
                array('captcha' => $imgData)
            );
        }
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
                $rv = array('title_label' => 'Forget Password',
                            'submit'  => 'Send');
                break;
            case 'zh-tw':
                $rv = array('title_label' => 'Forget Password',
                            'submit'  => 'Send');
                break;
            default:
                $rv = array('title_label' => 'Forget Password',
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