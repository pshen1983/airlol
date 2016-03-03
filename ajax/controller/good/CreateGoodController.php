<?php
class CreateGoodController extends AjaxController {

    protected function handle($params) {
        $status = 0;
        $message = '';

        if (ASession::isSignedIn()) {
            $departure = $_POST['departure'];
            $arrival = $_POST['arrival'];
            $date = $_POST['date'];

            $validDate = Format::isValidMySQLDate($date, true);
            if ($validDate) {
                $goodDao = new GoodDao();
                $goodDao->setDepartureCode($departure);
                $goodDao->setArrivalCode($arrival);
                $goodDao->setEndDate($date);
                $goodDao->setUserId(ASession::getSessionUserId());
                if ($goodDao->save()) {
                    $message = $goodDao->getId();
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