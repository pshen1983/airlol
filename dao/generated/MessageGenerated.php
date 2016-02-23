<?php
abstract class MessageGenerated extends AirlolDaoBase {

    public static $table = 'message';

    protected function init() {
        $this->var['id'] = 0;
        $this->var['trip_id'] = NULL;
        $this->var['good_id'] = NULL;
        $this->var['sender'] = NULL;
        $this->var['receiver'] = NULL;
        $this->var['comment'] = NULL;
        $this->var['create_time'] = NULL;

        $this->update['id'] = false;
        $this->update['trip_id'] = false;
        $this->update['good_id'] = false;
        $this->update['sender'] = false;
        $this->update['receiver'] = false;
        $this->update['comment'] = false;
        $this->update['create_time'] = false;
    }

    public function getId() {
        return $this->var['id'];
    }

    public function setTripId($trip_id) {
        if ($this->var['trip_id'] !== $trip_id) {
            $this->var['trip_id'] = $trip_id;
            $this->update['trip_id'] = true;
        }
    }
    public function getTripId() {
        return $this->var['trip_id'];
    }

    public function setGoodId($good_id) {
        if ($this->var['good_id'] !== $good_id) {
            $this->var['good_id'] = $good_id;
            $this->update['good_id'] = true;
        }
    }
    public function getGoodId() {
        return $this->var['good_id'];
    }

    public function setSender($sender) {
        if ($this->var['sender'] !== $sender) {
            $this->var['sender'] = $sender;
            $this->update['sender'] = true;
        }
    }
    public function getSender() {
        return $this->var['sender'];
    }

    public function setReceiver($receiver) {
        if ($this->var['receiver'] !== $receiver) {
            $this->var['receiver'] = $receiver;
            $this->update['receiver'] = true;
        }
    }
    public function getReceiver() {
        return $this->var['receiver'];
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