<?php
class CreateMessageValidator extends AjaxValidator {

    public function validate($params) {
        $valid = true;

        if ($valid) {
            $valid = ASession::isSignedIn();
            if (!$valid) {
                $this->setErrorDescription('not_signed_in');
            }
        }

        if ($valid) {
            $valid = !empty($_POST['msg']) && $_POST['gid'] && $_POST['tid'] && isset($_POST['context']);
            if (!$valid) {
                $this->setErrorDescription('invalid_post_params');
            }
        }

        return $valid;
    }
}
?>