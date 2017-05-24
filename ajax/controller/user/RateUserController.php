<?php
class RateUserController extends AjaxController {

    protected function handle($params) {
        $atReturn = array('status'=>0);

        $ratingDao = new RatingDao();
        $ratingDao->setUserId($params['user_id']);
        $ratingDao->setRating($params['rating']);
        $ratingDao->setTripGoodMapId($params['map_id']);
        $ratingDao->setRaterId(ASession::getSessionUserId());
        $ratingDao->setType($params['type']);
        if ($params['comment']) {
            $ratingDao->setComment($params['comment']);
        }

        if ($ratingDao->save()) {
            $atReturn['rating_id'] = $ratingDao->getId();
        } else {
            $atReturn['status'] = 1;
            $atReturn['message'] = 'internal_error';
        }

        return $atReturn;
    }
}
?>