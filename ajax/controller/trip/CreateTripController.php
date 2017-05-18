<?php
class CreateTripController extends AjaxController {

    protected function handle($params) {
        $status = 0;
        $message = '';
        $atReturn = array('status'=>$status);

        $tripDao = new TripDao();
        $tripDao->setDepartureCode($params['departure']);
        $tripDao->setArrivalCode($params['arrival']);
        $tripDao->setTripDate($params['date']);
        $tripDao->setUserId(ASession::getSessionUserId());
        $tripDao->setPrice($params['price']);
        $tripDao->setCurrency($params['currency']);
        $tripDao->setSpaceType($params['space_type']);

        if (!empty($params['weight'])) $tripDao->setWeight($params['weight']);
        if (!empty($params['weight_unit'])) $tripDao->setWeightUnit($params['weight_unit']);
        if (!empty($params['active'])) $tripDao->setActive($params['active']);

        if ($tripDao->save()) {
            $atReturn['trip_id'] = $tripDao->getId();
        } else {
            $status = 1;
            $atReturn['message'] = 'internal_error';
        }

        return $atReturn;
    }
}
?>