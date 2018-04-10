<?php
class UserDao extends UserQuery {

    public static function existEmail($email) {
        $res = parent::existEmail($email);
        return $res>0;
    }

    public static function getUserByEmail($email) {
        $key = self::$table.'_'.$email;
        $res = QueryCacher::instance()->get($key);
        if (!$res) {
            $res = parent::getUserByEmail($email);
            QueryCacher::instance()->set($key, $res);
        }

        $user = self::newFromQueryResult($res);

        return $user;
    }

    // ======================================================================

    public function getProfileImg() {
        $image = parent::getProfileImg();

        if (!empty($image)) {
            global $profile_image_folder;
            $image = $profile_image_folder.'/'.$image;
        } else {
            global $default_img;
            $image = $default_img;
        }

        return $image;
    }

    public function getOverallRatingValue() {
        $tripCount = $this->getRateTripCount();
        $goodCount = $this->getRateGoodCount();
        $total = $tripCount+$goodCount;

        if ($total==0) {
            return 0;
        }

        $tripRating = $tripCount*$this->getRateTripValue();
        $goodRating = $goodCount*$this->getRateGoodValue();

        return ($tripRating+$goodRating)/($tripCount+$goodCount);
    }

    public function getOverallRatingCount() {
        $tripCount = $this->getRateTripCount();
        $goodCount = $this->getRateGoodCount();

        return $tripCount+$goodCount;
    }

    public function checkPassword($password) {
        $passwd = $this->getPassword();
        return md5($password) == $passwd;
    }

    protected function actionBeforeInsert() {
        $passwd = $this->getPassword();
        $this->setPassword(md5($passwd));

        $now = date("Y-m-d H:i:s");
        $this->setCreateTime($now);
    }

    protected function actionBeforeUpdate() {
        if ($this->update['password']) {
            $passwd = $this->getPassword();
            $this->setPassword(md5($passwd));

            $key = self::$table.'_'.$this->getEmail();
            QueryCacher::instance()->delete($key);
        }
    }

    protected static function cacheById() { return TRUE; }
}