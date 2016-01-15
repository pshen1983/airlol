<?php
abstract class TripGenerated extends AirlolDaoBase {

    public static $table = 'trip';

    protected function init() {
        $this->var['id'] = 0;
        $this->var['user_id'] = NULL;
        $this->var['departure_id'] = NULL;
        $this->var['arrival_id'] = NULL;
        $this->var['trip_date'] = NULL;
        $this->var['space_type'] = NULL;
        $this->var['space_num'] = NULL;
        $this->var['space_unit'] = NULL;
        $this->var['contact_type'] = NULL;
        $this->var['price'] = NULL;
        $this->var['price_adjust'] = NULL;
        $this->var['create_time'] = NULL;

        $this->update['id'] = false;
        $this->update['user_id'] = false;
        $this->update['departure_id'] = false;
        $this->update['arrival_id'] = false;
        $this->update['trip_date'] = false;
        $this->update['space_type'] = false;
        $this->update['space_num'] = false;
        $this->update['space_unit'] = false;
        $this->update['contact_type'] = false;
        $this->update['price'] = false;
        $this->update['price_adjust'] = false;
        $this->update['create_time'] = false;
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

    public function setDepartureId($departure_id) {
        if ($this->var['departure_id'] !== $departure_id) {
            $this->var['departure_id'] = $departure_id;
            $this->update['departure_id'] = true;
        }
    }
    public function getDepartureId() {
        return $this->var['departure_id'];
    }

    public function setArrivalId($arrival_id) {
        if ($this->var['arrival_id'] !== $arrival_id) {
            $this->var['arrival_id'] = $arrival_id;
            $this->update['arrival_id'] = true;
        }
    }
    public function getArrivalId() {
        return $this->var['arrival_id'];
    }

    public function setTripDate($trip_date) {
        if ($this->var['trip_date'] !== $trip_date) {
            $this->var['trip_date'] = $trip_date;
            $this->update['trip_date'] = true;
        }
    }
    public function getTripDate() {
        return $this->var['trip_date'];
    }

    public function setSpaceType($space_type) {
        if ($this->var['space_type'] !== $space_type) {
            $this->var['space_type'] = $space_type;
            $this->update['space_type'] = true;
        }
    }
    public function getSpaceType() {
        return $this->var['space_type'];
    }

    public function setSpaceNum($space_num) {
        if ($this->var['space_num'] !== $space_num) {
            $this->var['space_num'] = $space_num;
            $this->update['space_num'] = true;
        }
    }
    public function getSpaceNum() {
        return $this->var['space_num'];
    }

    public function setSpaceUnit($space_unit) {
        if ($this->var['space_unit'] !== $space_unit) {
            $this->var['space_unit'] = $space_unit;
            $this->update['space_unit'] = true;
        }
    }
    public function getSpaceUnit() {
        return $this->var['space_unit'];
    }

    public function setContactType($contact_type) {
        if ($this->var['contact_type'] !== $contact_type) {
            $this->var['contact_type'] = $contact_type;
            $this->update['contact_type'] = true;
        }
    }
    public function getContactType() {
        return $this->var['contact_type'];
    }

    public function setPrice($price) {
        if ($this->var['price'] !== $price) {
            $this->var['price'] = $price;
            $this->update['price'] = true;
        }
    }
    public function getPrice() {
        return $this->var['price'];
    }

    public function setPriceAdjust($price_adjust) {
        if ($this->var['price_adjust'] !== $price_adjust) {
            $this->var['price_adjust'] = $price_adjust;
            $this->update['price_adjust'] = true;
        }
    }
    public function getPriceAdjust() {
        return $this->var['price_adjust'];
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