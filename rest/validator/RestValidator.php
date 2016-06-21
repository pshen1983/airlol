<?php
abstract class RestValidator {

    private $message = '';

    public function setErrorDescription($description) {
        $this->message = $description;
    }

    public function errorOut() {
        $result = array('status' => -1, 'message' => $this->message);
        echo json_encode($result);
    }

    abstract public function validate($params);
}
