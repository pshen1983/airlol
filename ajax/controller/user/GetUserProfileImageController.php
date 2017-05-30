<?php
class GetUserProfileImageController extends AjaxController {

    protected function handle($params) {
    	global $image_upload, $default_img;

    	if (empty($params['profile_image'])) {
			$remoteImage = $default_img;
    	} else {
    		$remoteImage = $image_upload.$params['profile_image'].'.png';
    		header('Content-Length: ' . filesize($remoteImage));
    	}

		header("Content-type: image/png");

		readfile($remoteImage);
    }
}
?>