<?php
class CreateTripValidator extends AjaxValidator {

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
            $valid = !empty($params['departure']) && !empty($params['arrival']);
            if (!$valid) {
                $this->setErrorDescription('missing_cities');
            }
        }

        if ($valid) {
            $valid = Format::isValidMySQLDate($params['date'], true);
            if (!$valid) {
                $this->setErrorDescription('invalid_date_format');
            }
        }

        if ($valid) {
            $valid = !empty($params['space_type']);// && !empty($params['weight']) && !empty($params['weight_unit']);
            if (!$valid) {
                $this->setErrorDescription('missing_space_type');
            }
        }

        if ($valid) {
            $valid = !empty($params['price']) && !empty($params['currency']);
            if (!$valid) {
                $this->setErrorDescription('missing_price');
            }
        }

        return $valid;
    }

    protected function getErrorCode() {
        return 400;
    }
}
?>