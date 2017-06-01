<?php
class UpdateTripValidator extends AjaxValidator {

    public function validate(& $params) {
        $valid = true;

        if ($valid) {
            $valid = ASession::isSignedIn();
            if (!$valid) {
                $this->errorStatusCode = 401;
                $this->setErrorDescription('not_signed_in');
            }
        }

        if ($valid) {
            $tripDao = new TripDao($params['tripid']);
            $valid = $tripDao->isFromDB();
            $params['trip'] = $tripDao;
            if (!$valid) {
                $this->errorStatusCode = 404;
                $this->setErrorDescription('trip_not_exist');
            }
        }

        if ($valid) {
            $valid = $tripDao->getUserId()==ASession::getSessionUserId();
            if (!$valid) {
                $this->errorStatusCode = 403;
                $this->setErrorDescription('update_not_allowed');
            }
        }

        return $valid;
    }
}
?>