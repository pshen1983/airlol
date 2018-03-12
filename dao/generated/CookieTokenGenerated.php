<?php
abstract class CookieTokenGenerated extends CairymeDaoBase {

    public static $table = 'cookie_token';

    protected function init() {
        $this->var['id'] = 0;
        $this->var['type'] = NULL;
        $this->var['value'] = NULL;
        $this->var['user_id'] = NULL;
        $this->var['data'] = NULL;
        $this->var['expires'] = NULL;
        $this->var['create_time'] = NULL;

        $this->update['id'] = false;
        $this->update['type'] = false;
        $this->update['value'] = false;
        $this->update['user_id'] = false;
        $this->update['data'] = false;
        $this->update['expires'] = false;
        $this->update['create_time'] = false;
    }

    public function getId() {
        return $this->var['id'];
    }

    public function setType($type) {
        if ($this->var['type'] !== $type) {
            $this->var['type'] = $type;
            $this->update['type'] = true;
        }
    }
    public function getType() {
        return $this->var['type'];
    }

    public function setValue($value) {
        if ($this->var['value'] !== $value) {
            $this->var['value'] = $value;
            $this->update['value'] = true;
        }
    }
    public function getValue() {
        return $this->var['value'];
    }

    public function setUserId($user_id) {
        if ($this->var['user_id'] !== $user_id) {
            $this->var['user_id'] = $user_id;
            $this->update['user_id'] = true;
        }
    }
    public function getUserId() {
        return $this->var['user_id'];
    }

    public function setData($data) {
        if ($this->var['data'] !== $data) {
            $this->var['data'] = $data;
            $this->update['data'] = true;
        }
    }
    public function getData() {
        return $this->var['data'];
    }

    public function setExpires($expires) {
        if ($this->var['expires'] !== $expires) {
            $this->var['expires'] = $expires;
            $this->update['expires'] = true;
        }
    }
    public function getExpires() {
        return $this->var['expires'];
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