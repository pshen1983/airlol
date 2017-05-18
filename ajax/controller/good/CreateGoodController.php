<?php
class CreateGoodController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('status'=>0);

        $goodDao = new GoodDao();
        $goodDao->setDepartureCode($params['departure']);
        $goodDao->setArrivalCode($params['arrival']);
        $goodDao->setEndDate($params['date']);
        $goodDao->setUserId(ASession::getSessionUserId());
        $goodDao->setPrice($params['price']);
        $goodDao->setCurrency($params['currency']);
        $goodDao->setType($params['type']);

        if (!empty($params['weight'])) $goodDao->setWeight($params['weight']);
        if (!empty($params['description'])) $goodDao->setDescription($params['description']);
        if (!empty($params['weight_unit'])) $goodDao->setWeightUnit($params['weight_unit']);
        if (isset($params['searchable'])) {
            $active = $params['searchable']=='true' ? 'Y' : 'N';
            $goodDao->setActive($active);
        }

        if ($goodDao->save()) {
            $atReturn['good_id'] = $goodDao->getId();
        } else {
            $atReturn['status'] = 1;
            $atReturn['message'] = 'internal_error';
        }

        return $atReturn;
    }
}
?>