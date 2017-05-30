<?php
class UpdateUserImageController extends AjaxController {

    protected function handle($params) {
    	global $image_upload;

    	$atReturn = array('status'=>'seccuss');

    	$fileName = 'profile_image_'.ASession::getSessionUserId().'_'.date('YmdHis').'_'.rand();

		$putData = fopen('php://input', 'r');

		$flag = true;
		$extension = '';
		$imageData = '';
		while ($data = fread($putData, 1024)) {
			if ($flag) {
				list($type, $data) = explode(';', $data);
				list(,$extension) = explode('/',$type);
			    list(,$data) = explode(',', $data);
				$flag = false;
			}
			$imageData.=$data;
		}

		fclose($putData);

		$decodeData = base64_decode($imageData);
		$image = imagecreatefromstring($decodeData);

		if ($image===FALSE) {
            $this->setStatusCode(400);
			$atReturn['status'] = 'error';
			$atReturn['description'] = 'wrong_file_format';
		} else {
			imagepng($image, $image_upload.$fileName.'.png');
			$userDao = new UserDao(ASession::getSessionUserId());
			$userDao->setProfileImg($fileName);
			$userDao->save();
		}

		return $atReturn;
    }
}
?>