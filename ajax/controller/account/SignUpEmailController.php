<?php
class SignUpEmailController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('status'=>0);

        $name = trim($params['name']);
        $email = trim($params['email']);
        $passwd = $params['passwd'];

        $user = new UserDao();
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($passwd);
        if ($user->save()) {
            ASession::setSessionUserId($user->getId());
//            Mailer::sendSignupWelcomeEmail($email, $name);

            if (isset($params['remember']) && $params['remember']=='remember') {
                $this->saveRememberMeCookie();
            }
            $atReturn['user_id'] = $user->getId();
        } else {
            header('HTTP/1.0 503 Service Unavailable');
            $atReturn['status'] = 1;
            $atReturn['description'] = 'cannot_save_user';
        }

        return $atReturn;
    }
}
?>