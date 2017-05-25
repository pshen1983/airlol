<?php
class GetTobeRatedController extends AjaxController {

    protected function handle($params) {
        $atReturn = array();
        $currentUser = ASession::getSessionUserId();

        $lastRateTime = RatingDao::getLastRateTime($currentUser, $params['type']);
        Log::debug('Last Rate Time - '.$lastRateTime);

        // get object since last rate time (unrated objects)
        $daos = array();
        if ($params['type']==RatingDao::$TRIP) {
            $daos = TripDao::getTripsAfter($lastRateTime, $currentUser);
        } else {
            $daos = GoodDao::getGoodsAfter($lastRateTime, $currentUser);
        }

        foreach ($daos as $dao) {
            if ($params['type']==RatingDao::$TRIP) {
                $ids = MapTripGoodDao::getTripGoodIds($dao->getId());
                $dao2s = GoodDao::getRange($ids);
            } else {
                $ids = MapTripGoodDao::getGoodTripIds($dao->getId());
                $dao2s = TripDao::getRange($ids);
            }
            Log::debug('ids - '.json_encode($ids));

            foreach ($dao2s as $dao2) {
                $userDao = new UserDao($dao2->getUserId());
                $user = $this->transferUserDao($userDao);

                if ($params['type']==RatingDao::$TRIP) {
                    $obj = $this->transferGoodDao($dao2);
                    $obj['trip_id'] = $dao->getId();
                } else {
                    $obj = $this->transferTripDao($dao2);
                    $obj['good_id'] = $dao->getId();
                }

                $atReturn[] = array_merge($user, $obj);
            }
        }

        // get user info and construct return array


        return $atReturn;
    }

    private function transferTripDao($tripDao) {
        $trip = array();
        $trip['trip_id'] = $tripDao->getId();
        $trip['departure'] = $tripDao->getDepartureCode();
        $trip['arrival'] = $tripDao->getArrivalCode();

        return $trip;
    }

    private function transferGoodDao($goodDao) {
        $good = array();
        $good['good_id'] = $goodDao->getId();
        $good['description'] = $goodDao->getDescription();

        return $good;
    }

    private function transferUserDao($userDao) {
        $user = array();
        $user['user_id'] = $userDao->getId();
        $user['name'] = $userDao->getName();
        $user['profile_image'] = $userDao->getProfileImg();

        return $user;
    }
}
?>