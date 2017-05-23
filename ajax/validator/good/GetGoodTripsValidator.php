<?php
class GetGoodTripsValidator extends AjaxValidator {

    public function validate($params) {
        $valid = true;

        if ($valid) {
            $valid = ASession::isSignedIn();
            if (!$valid) {
                $this->errorStatusCode = 401;
                $this->setErrorDescription('not_signed_in');
            }
        }

        if ($valid) {
            $goodDao = new GoodDao($params['goodid']);
            $valid = $goodDao->isFromDB();
            $params['good'] = $goodDao;
            if (!$valid) {
                $this->errorStatusCode = 404;
                $this->setErrorDescription('package_not_exist');
            }
        }

        return $valid;
    }
}
?>