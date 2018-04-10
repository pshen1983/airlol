<?php
class GetUserProfileImageController extends PageController {

    protected function handle($params) {
    	global $image_upload, $default_img;

        $user = new UserDao($params['userid']);

    	$remoteImage = $user->getProfileImg();

    	Log::debug('Profile Image User '.$params['userid'].' - '.$remoteImage);

    	ob_clean();

		header("Content-type: image/png");

		readfile($remoteImage);
    }
}
?>