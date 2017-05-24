<?php
class GetCitiesListValidator extends AjaxValidator {

    public function validate(& $params) {
        $valid = !empty($_GET['locale']);
        if (!$valid) {
            $this->setErrorDescription('missing_locale');
        }

        if ($valid) {
            $locale = $_GET['locale'];
            global $locales;
            $valid = in_array($locale, $locales);
            if (!$valid) {
                $this->setErrorDescription('locale_not_supported');
            }
        }

        return $valid;
    }
}
?>