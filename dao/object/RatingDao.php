<?php
class RatingDao extends RatingQuery {

	public static $TRIP = 1;
	public static $GOOD = 2;

    // ======================================================================

    protected function actionBeforeInsert() {
        $now = date("Y-m-d H:i:s");
        $this->setCreateTime($now);

        $userDao = new UserDao($this->getUserId());

        if ($this->getType()==self::$TRIP) {
	        $ratingCount = $userDao->getRateTripCount();
	        $ratingValue = $userDao->getRateTripValue();
        } else {
	        $ratingCount = $userDao->getRateGoodCount();
	        $ratingValue = $userDao->getRateGoodValue();
        }

        $ratingTotal = $ratingCount*$ratingValue;
        $ratingTotal+= $this->getRating();
        $ratingCount++;
        $ratingValue = round($ratingTotal/$ratingCount);

        if ($this->getType()==self::$TRIP) {
	        $userDao->setRateTripCount($ratingCount);
	        $userDao->setRateTripValue($ratingValue);
        } else {
	        $userDao->setRateGoodCount($ratingCount);
	        $userDao->setRateGoodValue($ratingValue);
        }

        $userDao->save();
    }

    protected static function cacheById() { return TRUE; }
}