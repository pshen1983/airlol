<?php
class RateUserValidator extends AjaxValidator {

    public function validate($params) {
        $valid = true;

        if ($valid) {
            $valid = !empty($_POST['user_id']);
            if (!$valid) {
                $this->setErrorDescription('missing_user_id');
            }
        }

        if ($valid) {
            $valid = !empty($_POST['rating']);
            if (!$valid) {
                $this->setErrorDescription('missing_rating');
            }
        }

        if ($valid) {
            $valid = !empty($_POST['trip_id']);
            if (!$valid) {
                $this->setErrorDescription('missing_trip_id');
            }
        }

        if ($valid) {
            $valid = !empty($_POST['good_id']);
            if (!$valid) {
                $this->setErrorDescription('missing_good_id');
            }
        }

        return $valid;
    }
}
?>