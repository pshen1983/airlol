<?php
class SearchTripController extends AjaxController {

    protected function handle($params) {
        $status = 0;
        $message = '';

        $trips = array();

        if (!empty($_GET['departure']) && !empty($_GET['arrival']) && !empty($_GET['page']) && Format::isValidMySQLDate($_GET['before'], true)) {

            $departure = $_GET['departure'];
            $arrival = $_GET['arrival'];
            global $page_size;
            $start = $page_size*($_GET['page']-1);
            $endDate = $_GET['before'];

            if (isset($_GET['whole_bag']) && $_GET['whole_bag']=='Y') {
                $tripDaos = TripDao::findTripByLocationAndDayAndBag($departure, $arrival, $endDate, $start, $page_size);
            } else {
                $tripDaos = TripDao::findTripByLocationAndDay($departure, $arrival, $endDate, $start, $page_size);
            }

            if (!empty($tripDaos)) {

                $userIds = array();
                foreach ($tripDaos as $tripDao) {
                    $trip = array();

                    $trip['id'] = $tripDao->getId();
                    $trip['trip_date'] = $tripDao->getTripDate();
                    $trip['asking_price'] = $tripDao->getPrice();
                    $trip['asking_currency'] = $tripDao->getCurrency();
                    $trip['weight'] = $tripDao->getWeight();
                    $trip['weight_unit'] = $tripDao->getWeightUnit();
                    $trip['whole_luggage'] = $tripDao->getSpaceType() == TripDao::$WHOLEBAG;

                    $userId = $tripDao->getUserId();

                    $trips[$userId] = array();
                    $trips[$userId]['trip'] = $trip;

                    $userIds[] = $userId;
                }

                $userDaos = UserDao::getRange($userIds);
                foreach ($userDaos as $userDao) {
                    $user = array();

                    $user['name'] = $userDao->getName();
                    $user['rating'] = array();
                    $user['rating']['value'] = $userDao->getRateGoodValue();
                    $user['rating']['total'] = $userDao->getRateGoodCount();
                    $user['join_time'] = $userDao->getCreateTime();
                    $user['join_time'] = substr($user['join_time'], 0, 10);
                    $user['response_time'] = $userDao->getResponseTime();

                    $trips[$userDao->getId()]['user'] = $user;
                }

                $trips = array_values($trips);
            }
        }

        return $trips;
    }
}
?>