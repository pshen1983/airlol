<?php
class GetUserGoodsController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('future'=>array(), 'past'=>array());

        $userId = ASession::getSessionUserId();
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

        if (empty($_GET['year'])) {
            $futureGoods = GoodDao::getUserFutureGoods($userId);
            foreach ($futureGoods as $futureGood) {
                $atReturn['future'][] = $this->transferDao($futureGood);
            }
        }

        $pastGoods = GoodDao::getUserPastGoods($userId, $year);
        foreach ($pastGoods as $pastGood) {
            $atReturn['past'][] = $this->transferDao($pastGood);
        }

        return $atReturn;
    }

    private function transferDao($tripDao) {
        $trip = array();
        $trip['id'] = $tripDao->getId();
        $trip['departure'] = $tripDao->getDepartureCode();
        $trip['arrival'] = $tripDao->getArrivalCode();
        $trip['date'] = $tripDao->getEndDate();
        $trip['type'] = $tripDao->getType();
        $trip['weight'] = $tripDao->getWeight();
        $trip['weight_unit'] = $tripDao->getWeightUnit();

        return $trip;
    }
}
?>