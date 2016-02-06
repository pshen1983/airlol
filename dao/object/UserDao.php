<?php
class UserDao extends UserQuery {

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

    protected function actionBeforeUpdate() {

    }

    protected function actionBeforeInsert() {
    	$now = date("Y-m-d H:i:s");
    	$this->setCreateTime($now);
    }
}