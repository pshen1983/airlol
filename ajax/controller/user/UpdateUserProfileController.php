<?php
class UpdateUserProfileController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('status'=>'success');

        $userId = ASession::getSessionUserId();
        $userDao = new UserDao($userId);

        if (isset($params['name'])) { $tripDao->setDepartureCode($params['name']); }
        if (isset($params['birth_day'])) { $tripDao->setArrivalCode($params['birth_day']); }
        if (isset($params['tel'])) { $tripDao->setTripDate($params['tel']); }
        if (isset($params['whatsapp'])) { $tripDao->setSpaceType($params['whatsapp']); }
        if (isset($params['wechat'])) { $tripDao->setSpaceNum($params['wechat']); }
        if (isset($params['preferred_language'])) { $tripDao->setSpaceUnit($params['preferred_language']); }
        if (isset($params['preferred_currency'])) { $tripDao->setActive($params['preferred_currency']); }
        if (isset($params['preferred_timezone'])) { $tripDao->setContactType($params['preferred_timezone']); }
        if (isset($params['preferred_method'])) { $tripDao->setPrice($params['preferred_method']); }
        if (isset($params['living_city'])) { $tripDao->setPrice($params['living_city']); }
        if (isset($params['self_description'])) { $tripDao->setPrice($params['self_description']); }

        if (!$tripDao->save()) {
            $this->setStatusCode(500);
            $atReturn['status'] = 'error';
            $atReturn['description'] = 'cannot_update_user';
        }

        return $atReturn;
    }
}
?>