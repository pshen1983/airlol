<?php
class SignInEmailController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('status'=>0);

        $email = trim($params['email']);
        $passwd = $params['password'];

        $user = UserDao::getUserByEmail($email);
        if ($user) {
            $validPasswd = $user->checkPassword($passwd);
            if ($validPasswd) {
                ASession::setSessionUserId($user->getId());

                if (isset($_POST['remember']) && $_POST['remember']=='remember') {
                    $this->saveRememberMeCookie();
                }
                $atReturn['user_id'] = $user->getId();
            } else {
                $this->setStatusCode(401);
                $atReturn['status'] = 2;
                $atReturn['message'] = 'invalid_combination';
            }
        } else {
            $this->setStatusCode(404);
            $atReturn['status'] = 1;
            $atReturn['message'] = 'account_not_found';
        }

        return $atReturn;
    }
}
?>