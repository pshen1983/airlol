<?php
class UpdateGoodController extends AjaxController {

    protected function handle($params) {
        $status = 0;
        $message = '';

        if ($this->isSignedIn()) {
            $goodDao = new GoodDao($params['goodid']);
            if ($goodDao->isFromDB()) {
                if ($goodDao->getUserId()==$_SESSION['uid']) {
                    if (isset($_POST['departure'])) { $goodDao->setDepartureCode($_POST['departure']); }
                    if (isset($_POST['arrival'])) { $goodDao->setArrivalCode($_POST['arrival']); }
                    if (isset($_POST['end_date'])) { $goodDao->setEndDate($_POST['end_date']); }
                    if (isset($_POST['type'])) { $goodDao->setGoodType($_POST['type']); }
                    if (isset($_POST['unit'])) { $goodDao->setGoodUnit($_POST['unit']); }
                    if (isset($_POST['description'])) { $goodDao->setDescription($_POST['description']); }
                    if (isset($_POST['active'])) { $goodDao->setActive($_POST['active']); }
                    if (isset($_POST['contact'])) { $goodDao->setContactType($_POST['contact']); }
                    if (isset($_POST['price'])) { $goodDao->setPrice($_POST['price']); }
                    if (isset($_POST['price_adjust'])) { $goodDao->setPriceAdjust($_POST['price_adjust']); }

                    $goodDao->save();
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