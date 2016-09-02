<?php
class SearchTripController extends AjaxController {

    protected function handle($params) {
        $status = 0;
        $message = '';

        if (!empty($_GET['departure']) && !empty($_GET['arrival']) && !empty($_GET['page']) && 
            Format::isValidMySQLDate($_GET['start']) && Format::isValidMySQLDate($_GET['end'], true)) {

            $departure = $_GET['departure'];
            $arrival = $_GET['arrival'];
            global $page_size;
            $start = $page_size*($_GET['page']-1);
            $startDate = $_GET['start'];
            $endDate = $_GET['end'];

            if (isset($_GET['whole_bag']) && $_GET['whole_bag']=='Y') {
                $tripDaos = TripDao::findTripByLocationAndDayAndBag($departure, $arrival, $startDate, $endDate, $start, $page_size);
            } else {
                $tripDaos = TripDao::findTripByLocationAndDay($departure, $arrival, $startDate, $endDate, $start, $page_size);
            }

            $trips = array();
            foreach ($tripDaos as $tripDao) {
                $trips[] = $tripDao->toArray();
            }

            View::addTemplate('trip_list', $trips);
        }
    }
}
?>