<?php
abstract class AjaxController {
    public function execute($params) {
        session_start();
        $result = $this->handle($params);

        echo $result;
    }

    protected function isSignedIn() {
        return isset($_SESSION['uid']) && $_SESSION['uid']>0;
    }

    abstract protected function handle($params);
}
?>