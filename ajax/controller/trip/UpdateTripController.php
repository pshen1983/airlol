<?php
class UpdateTripeController extends AjaxController {

    protected function handle($params) {        $status = 0;
        $message = '';

        if (ASession::isSignedIn()) {
            $tripDao = new TripDao($params['tripid']);
            if ($tripDao->isFromDB()) {
                if ($tripDao->getUserId()==ASession::getSessionUserId()) {
                    if (isset($_POST['departure'])) { $tripDao->setDepartureCode($_POST['departure']); }
                    if (isset($_POST['arrival'])) { $tripDao->setArrivalCode($_POST['arrival']); }
                    if (isset($_POST['trip_date'])) { $tripDao->setTripDate($_POST['trip_date']); }
                    if (isset($_POST['space_type'])) { $tripDao->setSpaceType($_POST['space_type']); }
                    if (isset($_POST['space_num'])) { $tripDao->setSpaceNum($_POST['space_num']); }
                    if (isset($_POST['space_unit'])) { $tripDao->setSpaceUnit($_POST['space_unit']); }
                    if (isset($_POST['active'])) { $tripDao->setActive($_POST['active']); }
                    if (isset($_POST['contact'])) { $tripDao->setContactType($_POST['contact']); }
                    if (isset($_POST['price'])) { $tripDao->setPrice($_POST['price']); }
                    if (isset($_POST['price_adjust'])) { $tripDao->setPriceAdjust($_POST['price_adjust']); }

                    $tripDao->save();
                } else {
                    $status = 1;
                    $message = 'not_allow';
                }
            } else {
                $status = 2;
                $message = 'not_found';
            }
        } else {
            $status = 3;
            $message = 'not_signin';
        }

        return array('status'=>$status, 'message'=>$message);
    }
}
?>