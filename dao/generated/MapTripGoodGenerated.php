<?php
abstract class MapTripGoodGenerated extends AirlolDaoBase {

    public static $table = 'map_trip_good';

    protected function init() {
        $this->var['id'] = 0;
        $this->var['trip_id'] = NULL;
        $this->var['good_id'] = NULL;
        $this->var['create_time'] = NULL;

        $this->update['id'] = false;
        $this->update['trip_id'] = false;
        $this->update['good_id'] = false;
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