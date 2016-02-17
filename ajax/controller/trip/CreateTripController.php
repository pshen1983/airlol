<?php
class CreateTripController extends AjaxController {

    protected function handle($params) {
        $status = 0;
        $message = '';

        if ($this->isSignedIn()) {
            $departure = $_POST['departure'];
            $arrival = $_POST['arrival'];
            $date = $_POST['date'];

            $validDate = Format::isValidMySQLDate($date, true);
            if ($validDate) {
                $tripDao = new TripDao();
                $tripDao->setDepartureCode($departure);
                $tripDao->setArrivalCode($arrival);
                $tripDao->setTripDate($date);
                $tripDao->setUserId($_SESSION['uid']);
                if ($tripDao->save()) {
                    $message = $tripDao->getId();
                } else {
                    $status = 1;
                    $message = '';
                }
            } else {
                $status = 2;
                $message = '';
            }
        } else {
            $status = 3;
            $message = '';
        }

        return array('status'=>$status, 'message'=>$message);
    }
}
?>