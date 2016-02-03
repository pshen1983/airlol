<?php
class UserQuery extends UserGenerated {


    protected function actionBeforeInsert() {
    	$now = date("Y-m-d H:i:s");
    	$this->setCreateTime($now);
    }
	
}