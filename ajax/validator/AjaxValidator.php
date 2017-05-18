<?php
abstract class AjaxValidator {

    private $message = '';
    protected $errorStatusCode = null;

    public function setErrorDescription($description) {
        $this->message = $description;
    }

    public function errorOut() {
        $result = array('status' => -1, 'message' => $this->message);
        $errorCode = isset($this->errorStatusCode) ? $this->errorStatusCode : $this->getErrorCode();
        $this->setStatusCode($errorCode);
        echo json_encode($result);
    }

    protected function getErrorCode() {
        return 200;
    }

    protected function setStatusCode($code) {
    	switch ($code) {
    		case 200: $text = 'OK'; break;
    		case 400: $text = 'Bad Request'; break;
    		case 401: $text = 'Unauthorized'; break;
    		case 402: $text = 'Payment Required'; break;
            case 403: $text = 'Forbidden'; break;
            case 404: $text = 'Not Found'; break;
            case 405: $text = 'Method Not Allowed'; break;
            case 406: $text = 'Not Acceptable'; break;
            case 407: $text = 'Proxy Authentication Required'; break;
            case 408: $text = 'Request Time-out'; break;
            case 409: $text = 'Conflict'; break;
            case 410: $text = 'Gone'; break;
            case 411: $text = 'Length Required'; break;
            case 412: $text = 'Precondition Failed'; break;
            case 413: $text = 'Request Entity Too Large'; break;
            case 414: $text = 'Request-URI Too Large'; break;
            case 415: $text = 'Unsupported Media Type'; break;
    		case 500: $text = 'Internal Server Error'; break;
    	}

    	header('HTTP/1.0 '.$code.' '.$text);
    }

    abstract public function validate($params);
}
