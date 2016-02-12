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
        }
    }
}