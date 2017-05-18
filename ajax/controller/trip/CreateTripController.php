<?php
class CreateTripController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('status'=>0);

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
        if (isset($params['searchable'])) {
            $active = $params['searchable']=='true' ? 'Y' : 'N';
            $tripDao->setActive($active);
        }

        if ($tripDao->save()) {
            $atReturn['trip_id'] = $tripDao->getId();
        } else {
            $atReturn['status'] = 1;
            $atReturn['message'] = 'internal_error';
        }

        return $atReturn;
    }
}
?>