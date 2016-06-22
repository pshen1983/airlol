<?php
class UserSigninController extends AjaxController {

    protected function handle($params) {
        $status = 0;
        $message = 'success';

        $email = $_POST['email'];
        $passwd = $_POST['password'];

        $user = UserDao::getUserByEmail($email);

        $validPasswd = $user->checkPassword($passwd);
        if ($validPasswd) {
            ASession::setSessionUserId($user->getId());
        } else {
            $status = 1;
            $message = 'invalid_password';
        }

        return array('status'=>$status, 'message'=>$message);
    }
}
?>