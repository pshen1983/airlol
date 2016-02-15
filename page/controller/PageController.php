<?php
abstract class PageController {
    public function execute($params) {
        session_start();
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