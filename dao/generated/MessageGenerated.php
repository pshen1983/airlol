<?php
abstract class MessageGenerated extends CairymeDaoBase {

    public static $table = 'message';

    protected function init() {
        $this->var['id'] = 0;
        $this->var['trip_good_map_id'] = NULL;
        $this->var['sender_id'] = NULL;
        $this->var['receiver_id'] = NULL;
        $this->var['type'] = NULL;
        $this->var['comment'] = NULL;
        $this->var['create_time'] = NULL;

        $this->update['id'] = false;
        $this->update['trip_good_map_id'] = false;
        $this->update['sender_id'] = false;
        $this->update['receiver_id'] = false;
        $this->update['type'] = false;
        $this->update['comment'] = false;
        $this->update['create_time'] = false;
    }

    public function getId() {
        return $this->var['id'];
    }

    public function setTripGoodMapId($trip_good_map_id) {
        if ($this->var['trip_good_map_id'] !== $trip_good_map_id) {
            $this->var['trip_good_map_id'] = $trip_good_map_id;
            $this->update['trip_good_map_id'] = true;
        }
    }
    public function getTripGoodMapId() {
        return $this->var['trip_good_map_id'];
    }

    public function setSenderId($sender_id) {
        if ($this->var['sender_id'] !== $sender_id) {
            $this->var['sender_id'] = $sender_id;
            $this->update['sender_id'] = true;
        }
    }
    public function getSenderId() {
        return $this->var['sender_id'];
    }

    public function setReceiverId($receiver_id) {
        if ($this->var['receiver_id'] !== $receiver_id) {
            $this->var['receiver_id'] = $receiver_id;
            $this->update['receiver_id'] = true;
        }
    }
    public function getReceiverId() {
        return $this->var['receiver_id'];
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

    public function setComment($comment) {
        if ($this->var['comment'] !== $comment) {
            $this->var['comment'] = $comment;
            $this->update['comment'] = true;
        }
    }
    public function getComment() {
        return $this->var['comment'];
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