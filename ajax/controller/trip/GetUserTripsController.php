<?php
class GetUserTripsController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('future'=>array(), 'past'=>array());

        $userId = ASession::getSessionUserId();
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

        if (empty($_GET['year'])) {
            $futureTrips = TripDao::getUserFutureTrips($userId);
            foreach ($futureTrips as $futureTrip) {
                $atReturn['future'][] = $this->transferDao($futureTrip);
            }
        }

        $pastTrips = TripDao::getUserPastTrips($userId, $year);
        foreach ($pastTrips as $pastTrip) {
            $atReturn['past'][] = $this->transferDao($pastTrip);
        }

        return $atReturn;
    }

    private function transferDao($tripDao) {
        $trip = array();
        $trip['id'] = $tripDao->getId();
        $trip['departure'] = $tripDao->getDepartureCode();
        $trip['arrival'] = $tripDao->getArrivalCode();
        $trip['date'] = $tripDao->getTripDate();
        $trip['space_type'] = $tripDao->getSpaceType();
        $trip['weight'] = $tripDao->getWeight();
        $trip['weight_unit'] = $tripDao->getWeightUnit();

        return $trip;
    }
}
?>