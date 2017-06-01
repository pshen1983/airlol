<?php
class UpdateTripController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('status'=>'success');

        $tripDao = $params['trip'];

        if (isset($params['departure'])) { $tripDao->setDepartureCode($params['departure']); }
        if (isset($params['arrival'])) { $tripDao->setArrivalCode($params['arrival']); }
        if (isset($params['trip_date'])) { $tripDao->setTripDate($params['trip_date']); }
        if (isset($params['space_type'])) { $tripDao->setSpaceType($params['space_type']); }
        if (isset($params['space_num'])) { $tripDao->setSpaceNum($params['space_num']); }
        if (isset($params['space_unit'])) { $tripDao->setSpaceUnit($params['space_unit']); }
        if (isset($params['active'])) { $tripDao->setActive($params['active']); }
        if (isset($params['contact'])) { $tripDao->setContactType($params['contact']); }
        if (isset($params['price'])) { $tripDao->setPrice($params['price']); }
        if (isset($params['price_adjust'])) { $tripDao->setPriceAdjust($params['price_adjust']); }

        if (!$tripDao->save()) {
            $this->setStatusCode(500);
            $atReturn['status'] = 'error';
            $atReturn['description'] = 'cannot_update_trip';
        }

        return $atReturn;
    }
}
?>