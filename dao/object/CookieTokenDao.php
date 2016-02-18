<?php
class CookieTokenDao extends CookieTokenQuery {

    const REMEMBER_ME = 1;
    const DURATION = 30;

    public static function getRememberMeTokenByValue($value) {
        $now = date('Y-m-d H:i:s');
        $res = parent::getTokenByTypeAndValueAndExpire(self::REMEMBER_ME, $value, $now);

        $token = self::newFromQueryResult($res);

        return $token;
    }

    // ======================================================================

    protected function actionBeforeInsert() {
        $now = date("Y-m-d H:i:s");
        $this->setCreateTime($now);

        $date = date('Y-m-d H:i:s', strtotime('+'.self::DURATION.' days'));
        $this->setExpires($date);
    }
}
?>