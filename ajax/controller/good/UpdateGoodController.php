<?php
class UpdateGoodController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('status'=>'success');

        $goodDao = $params['good'];

        if (isset($params['departure'])) { $goodDao->setDepartureCode($params['departure']); }
        if (isset($params['arrival'])) { $goodDao->setArrivalCode($params['arrival']); }
        if (isset($params['end_date'])) { $goodDao->setEndDate($params['end_date']); }
        if (isset($params['type'])) { $goodDao->setGoodType($params['type']); }
        if (isset($params['unit'])) { $goodDao->setGoodUnit($params['unit']); }
        if (isset($params['description'])) { $goodDao->setDescription($params['description']); }
        if (isset($params['active'])) { $goodDao->setActive($params['active']); }
        if (isset($params['contact'])) { $goodDao->setContactType($params['contact']); }
        if (isset($params['price'])) { $goodDao->setPrice($params['price']); }
        if (isset($params['price_adjust'])) { $goodDao->setPriceAdjust($params['price_adjust']); }

        if (!$goodDao->save()) {
            $this->setStatusCode(500);
            $atReturn['status'] = 'error';
            $atReturn['description'] = 'cannot_update_package';
        }

        return $atReturn;
    }
}
?>