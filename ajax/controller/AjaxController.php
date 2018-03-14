<?php
abstract class AjaxController {
    private $statusCode = null;

    public function execute($params) {
        $result = $this->handle($params);

        if (is_array($result)) {
            Log::debug('AjaxController - '.$_SERVER['REQUEST_URI'].' Result:'.json_encode($result));
            echo json_encode($result);
            if (empty($this->statusCode)) {
                $this->setStatusCode(200);
            }
        }
    }


    protected function saveRememberMeCookie() {
        $token = Utility::generateToken(64);

        $cookieTokenDao = new CookieTokenDao();
        $cookieTokenDao->setUserId(ASession::getSessionUserId());
        $cookieTokenDao->setValue($token);
        $cookieTokenDao->setType(CookieTokenDao::REMEMBER_ME);
        $cookieTokenDao->save();

        setcookie(
            'REMEMBERME',
            $token,
            time() + CookieTokenDao::DURATION*86400,
            '/',
            null,
            false, // TLS-only
            true  // http-only
        );
    }


    protected function logoutCookie() {
        $token = $_COOKIE['REMEMBERME'];
        $cookieTokenDao = CookieTokenDao::getRememberMeTokenByValue($token);
        if ($cookieTokenDao) {
            $cookieTokenDao->delete();
        }
    }


    private function cookieLogin() {
        $token = $_COOKIE['REMEMBERME'];
        $cookieTokenDao = CookieTokenDao::getRememberMeTokenByValue($token);
        if ($cookieTokenDao) {
            ASession::setSessionUserId($cookieTokenDao->getUserId());
        }
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
            case 503: $text = 'Service Unavailable'; break;
    	}

        $this->statusCode = $code;

    	header('HTTP/1.0 '.$code.' '.$text);
    }

    abstract protected function handle($params);
}
?>