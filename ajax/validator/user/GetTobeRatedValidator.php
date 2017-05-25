<?php
class GetTobeRatedValidator extends AjaxValidator {

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
            $valid = isset($_GET['type']) && ($_GET['type']=='package' || $_GET['type']=='trip');
            if (!$valid) {
                $this->setErrorDescription('invalid_type');
            } else {
                if ($_GET['type']=='trip') {
                    $params['type'] = RatingDao::$TRIP;
                } else {
                    $params['type'] = RatingDao::$GOOD;
                }
            }
        }

        return $valid;
    }

    protected function getErrorCode() {
        return 400;
    }
}
?>