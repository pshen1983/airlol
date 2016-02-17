<?php
abstract class PageController {

    private $language = 'en';

    public function execute($params) {
        session_start();

        $isLogin = $this->isSignedIn();

        if ($isLogin) {
            $userDao = new UserDao($_SESSION['uid']);
            $_SESSION['user'] = $userDao;
            View::addParam(array('header_user_name' => $userDao->getName()));
        }

        View::addParam(
            array( 'user_session' => $isLogin,
                   'btn_header_signin' => 'Sign in',
                   'btn_header_signup' => 'Sign up',
                   'btn_signin_submit' => 'Sign in')
        );

        $this->handle($params);
    }

    protected function isPost() {
        return $_SERVER['REQUEST_METHOD']=='POST';
    }

    protected function isSignedIn() {
        return isset($_SESSION['uid']) && $_SESSION['uid']>0;
    }

    protected function redirect($url, $exit=true) {
        header('Location: '.$url);
        if ($exit) { exit; }
    }

    abstract protected function handle($params);
}
?>