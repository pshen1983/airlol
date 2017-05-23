<?php
class GetTripGoodsController extends AjaxController {

    protected function handle($params) {
        $goodIds = MapTripGoodDao::getTripGoodIds($params['tripid']);

        $goodDaos = GoodDao::getRange($goodIds);

        $goods = array();
        foreach ($goodDaos as $goodDao) {
            if (ASession::getSessionUserId()!=$goodDao->getUserId()) {
                $good = $this->transferGoodDao($goodDao);
                $userDao = new UserDao($goodDao->getUserId());
                $good['user'] = $this->transferUserDao($userDao);

                $mapTripGoodDao = MapTripGoodDao::getDaoByTripAndGood($params['tripid'], $goodDao->getId());
                $mapUserMessageDao = MapUserMessageDao::getDaoByMapAndUser($mapTripGoodDao->getId(), ASession::getSessionUserId());
                $good['new_message_count'] = MessageDao::getTripGoodNewMessageCount($mapTripGoodDao->getId(), $mapUserMessageDao->getLastRead());

                $goods[] = $good;
            }
        }

        return $goods;
    }

    private function transferGoodDao($goodDao) {
        $good = array();
        $good['id'] = $goodDao->getId();
        $good['departure'] = $goodDao->getDepartureCode();
        $good['arrival'] = $goodDao->getArrivalCode();
        $good['date'] = $goodDao->getEndDate();
        $good['type'] = $goodDao->getType();
        $good['weight'] = $goodDao->getWeight();
        $good['weight_unit'] = $goodDao->getWeightUnit();

        return $good;
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