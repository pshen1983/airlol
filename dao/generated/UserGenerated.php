<?php
abstract class UserGenerated extends AirlolDaoBase {

    public static $table = 'user';

    protected function init() {
        $this->var['id'] = 0;
        $this->var['email'] = NULL;
        $this->var['tel'] = NULL;
        $this->var['password'] = NULL;
        $this->var['name'] = NULL;
        $this->var['create_time'] = NULL;

        $this->update['id'] = false;
        $this->update['email'] = false;
        $this->update['tel'] = false;
        $this->update['password'] = false;
        $this->update['name'] = false;
        $this->update['create_time'] = false;
    }

    public function getId() {
        return $this->var['id'];
    }

    public function setEmail($email) {
        if ($this->var['email'] !== $email) {
            $this->var['email'] = $email;
            $this->update['email'] = true;
        }
    }
    public function getEmail() {
        return $this->var['email'];
    }

    public function setTel($tel) {
        if ($this->var['tel'] !== $tel) {
            $this->var['tel'] = $tel;
            $this->update['tel'] = true;
        }
    }
    public function getTel() {
        return $this->var['tel'];
    }

    public function setPassword($password) {
        if ($this->var['password'] !== $password) {
            $this->var['password'] = $password;
            $this->update['password'] = true;
        }
    }
    public function getPassword() {
        return $this->var['password'];
    }

    public function setName($name) {
        if ($this->var['name'] !== $name) {
            $this->var['name'] = $name;
            $this->update['name'] = true;
        }
    }
    public function getName() {
        return $this->var['name'];
    }

    public function setCreateTime($create_time) {
        if ($this->var['create_time'] !== $create_time) {
            $this->var['create_time'] = $create_time;
            $this->update['create_time'] = true;
        }
    }
    public function getCreateTime() {
        return $this->var['create_time'];
    }

    protected function getIdColumnName() {
        return 'id';
    }
}