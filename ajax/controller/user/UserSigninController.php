<?php
class UserSigninController extends AjaxController {

    protected function handle($params) {
        $status = 0;
        $message = '';

        $email = $_POST['email'];
        $passwd = $_POST['password'];

        $validEmail = Format::isValidEmail($email);
        if ($validEmail) {
            $user = UserDao::getUserByEmail($email);
            if ($user) {
                $validPasswd = $user->checkPassword($passwd);
                if ($validPasswd) {
                    $_SESSION['uid'] = $user->getId();
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

        return array('status'=>$status, 'message'=>$message);

    }
}
?>