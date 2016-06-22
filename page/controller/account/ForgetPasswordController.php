<?php
class ForgetPasswordController extends PageController {
    protected function handle($params) {
        $status = 0;
        $message = '';

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
        }

        View::setTitle('AirLOL | Forget Password');
        View::addJs('account.js');
        View::addCss('account.css');

        View::factory('account/forgetpassword',
            array('submit'  => 'Send',
                  'status'  => $status,
                  'message' => $message)
        );
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