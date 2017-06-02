<?php
class ChangeEmailPasswordController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('status'=>'success');

        $passwd = $params['password'];

        $userDao = $params['user_dao'];

        $userDao->setPassword($passwd);

        if (!$userDao->save()) {
            $this->setStatusCode(500);
            $atReturn['status'] = 'error';
            $atReturn['description'] = 'cannot_update_password';
        }

        return $atReturn;
    }
}
?>