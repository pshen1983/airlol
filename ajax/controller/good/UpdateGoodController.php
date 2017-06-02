<?php
class UpdateGoodController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('status'=>'success');

        $goodDao = $params['good'];

        if (isset($params['departure_code'])) { $goodDao->setDepartureCode($params['departure_code']); }
        if (isset($params['arrival_code'])) { $goodDao->setArrivalCode($params['arrival_code']); }
        if (isset($params['end_date'])) { $goodDao->setEndDate($params['end_date']); }
        if (isset($params['type'])) { $goodDao->setGoodType($params['type']); }
        if (isset($params['weight'])) { $goodDao->setGoodUnit($params['weight']); }
        if (isset($params['weight_unit'])) { $goodDao->setDescription($params['weight_unit']); }
        if (isset($params['description'])) { $goodDao->setActive($params['description']); }
        if (isset($params['price'])) { $goodDao->setPrice($params['price']); }
        if (isset($params['currency'])) { $goodDao->setContactType($params['currency']); }
        if (isset($params['active'])) { $goodDao->setPriceAdjust($params['active']); }

        if (!$goodDao->save()) {
            $this->setStatusCode(500);
            $atReturn['status'] = 'error';
            $atReturn['description'] = 'cannot_update_package';
        }

        return $atReturn;
    }
}
?>