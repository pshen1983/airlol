<?php
abstract class MapUserMessageGenerated extends AirlolDaoBase {

    public static $table = 'map_user_message';

    protected function init() {
        $this->var['id'] = 0;
        $this->var['user_id'] = NULL;
        $this->var['map_id'] = NULL;
        $this->var['last_read'] = NULL;

        $this->update['id'] = false;
        $this->update['user_id'] = false;
        $this->update['map_id'] = false;
        $this->update['last_read'] = false;
    }

    public function getId() {
        return $this->var['id'];
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

    public function setMapId($map_id) {
        if ($this->var['map_id'] !== $map_id) {
            $this->var['map_id'] = $map_id;
            $this->update['map_id'] = true;
        }
    }
    public function getMapId() {
        return $this->var['map_id'];
    }

    public function setLastRead($last_read) {
        if ($this->var['last_read'] !== $last_read) {
            $this->var['last_read'] = $last_read;
            $this->update['last_read'] = true;
        }
    }
    public function getLastRead() {
        return $this->var['last_read'];
    }

    protected function getIdColumnName() {
        return 'id';
    }
}