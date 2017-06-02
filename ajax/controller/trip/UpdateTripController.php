<?php
class UpdateTripController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('status'=>'success');

        $tripDao = $params['trip'];

        if (isset($params['departure_code'])) { $tripDao->setDepartureCode($params['departure_code']); }
        if (isset($params['arrival_code'])) { $tripDao->setArrivalCode($params['arrival_code']); }
        if (isset($params['trip_date'])) { $tripDao->setTripDate($params['trip_date']); }
        if (isset($params['space_type'])) { $tripDao->setSpaceType($params['space_type']); }
        if (isset($params['weight'])) { $tripDao->setSpaceNum($params['weight']); }
        if (isset($params['weight_unit'])) { $tripDao->setSpaceUnit($params['weight_unit']); }
        if (isset($params['active'])) { $tripDao->setActive($params['active']); }
        if (isset($params['currency'])) { $tripDao->setContactType($params['currency']); }
        if (isset($params['price'])) { $tripDao->setPrice($params['price']); }

        if (!$tripDao->save()) {
            $this->setStatusCode(500);
            $atReturn['status'] = 'error';
            $atReturn['description'] = 'cannot_update_trip';
        }

        return $atReturn;
    }
}
?>