<?php
class GetGoodTripsController extends AjaxController {

    protected function handle($params) {
        $tripIds = MapTripGoodDao::getGoodTripIds($params['goodid']);
        $tripDaos = TripDao::getRange($tripIds);

        $trips = array();
        foreach ($tripDaos as $tripDao) {
            if (ASession::getSessionUserId()!=$tripDao->getUserId()) {
                $trip = $this->transferTripDao($tripDao);
                $userDao = new User($tripDao->getUserId());
                $trip['user'] = $this->transferUserDao($userDao);

                $mapTripGoodDao = MapTripGoodDao::getDaoByTripAndGood($tripDao->getId(), $params['goodid']);
                $mapUserMessageDao = MapUserMessageDao::getDaoByMapAndUser($mapTripGoodDao->getId(), ASession::getSessionUserId());
                $trip['new_message_count'] = MessageDao::getTripGoodNewMessageCount($mapTripGoodDao->getId(), $mapUserMessageDao->getLastRead());

                $trips[] = $trip;
            }
        }

        return $trips;
    }

    private function transferTripDao($tripDao) {
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

    private function transferUserDao($userDao) {
        $user = array();
        $user['id'] = $userDao->getId();
        $user['name'] = $userDao->getName();
        $user['profile_image'] = $userDao->getProfileImg();
        $user['overall_rating_value'] = $userDao->getOverallRatingValue();
        $user['overall_rating_count'] = $userDao->getOverallRatingCount();

        return $user;
    }
}
?>