<?php
class CreateTripController extends AjaxController {

    protected function handle($params) {
        $status = 0;
        $message = '';

        $departure = $_POST['departure'];
        $arrival = $_POST['arrival'];
        $date = $_POST['date'];

        $tripDao = new TripDao();
        $tripDao->setDepartureCode($departure);
        $tripDao->setArrivalCode($arrival);
        $tripDao->setTripDate($date);
        $tripDao->setUserId(ASession::getSessionUserId());

        if ($tripDao->save()) {
            $message = $tripDao->getId();
        } else {
            $status = 1;
            $message = 'internal_error';
        }

        return array('status'=>$status, 'message'=>$message);
    }
}
?>