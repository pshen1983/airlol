<?php
class RateUserValidator extends AjaxValidator {

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
            $valid = !empty($params['rating']) && !empty($params['trip_id']) && !empty($params['good_id']);
            if (!$valid) {
                $this->setErrorDescription('missing_parameters');
            }
        }

        if ($valid) {
            $mapDao = MapTripGoodDao::getDaoByTripAndGood($params['trip_id'], $params['good_id']);
            $valid = isset($mapDao) && $mapDao->isFromDB();

            if ($valid) {
                $params['map_id'] = $mapDao->getId();
            } else {
                $this->errorStatusCode = 404;
                $this->setErrorDescription('cannot_find_autorization');
            }
        }

        if ($valid) {
            $tripDao = new TripDao($params['trip_id']);
            $goodDao = new GoodDao($params['good_id']);

            $currentUser = ASession::getSessionUserId();
            $tripOwner = $tripDao->getUserId();
            $goodOwner = $goodDao->getUserId();

            if ($currentUser==$tripOwner) {
                $params['type'] = RatingDao::$TRIP;
                $params['user_id'] = $goodOwner;
            } else if ($currentUser==$goodOwner) {
                $params['type'] = RatingDao::$GOOD;
                $params['user_id'] = $tripOwner;
            } else {
                $this->errorStatusCode = 403;
                $this->setErrorDescription('cannot_rate');
                $valid = false;
            }
        }

        return $valid;
    }

    protected function getErrorCode() {
        return 400;
    }
}
?>