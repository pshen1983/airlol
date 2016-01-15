<?php
abstract class RatingGenerated extends AirlolDaoBase {

    public static $table = 'rating';

    protected function init() {
        $this->var['id'] = 0;
        $this->var['trip_id'] = NULL;
        $this->var['user_id'] = NULL;
        $this->var['rater_id'] = NULL;
        $this->var['type'] = NULL;
        $this->var['rating'] = NULL;
        $this->var['comment'] = NULL;
        $this->var['create_time'] = NULL;

        $this->update['id'] = false;
        $this->update['trip_id'] = false;
        $this->update['user_id'] = false;
        $this->update['rater_id'] = false;
        $this->update['type'] = false;
        $this->update['rating'] = false;
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

    public function setUserId($user_id) {
        if ($this->var['user_id'] !== $user_id) {
            $this->var['user_id'] = $user_id;
            $this->update['user_id'] = true;
        }
    }
    public function getUserId() {
        return $this->var['user_id'];
    }

    public function setRaterId($rater_id) {
        if ($this->var['rater_id'] !== $rater_id) {
            $this->var['rater_id'] = $rater_id;
            $this->update['rater_id'] = true;
        }
    }
    public function getRaterId() {
        return $this->var['rater_id'];
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

    public function setRating($rating) {
        if ($this->var['rating'] !== $rating) {
            $this->var['rating'] = $rating;
            $this->update['rating'] = true;
        }
    }
    public function getRating() {
        return $this->var['rating'];
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