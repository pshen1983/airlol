<?php
abstract class TripGenerated extends CairymeDaoBase {

    public static $table = 'trip';

    protected function init() {
        $this->var['id'] = 0;
        $this->var['user_id'] = NULL;
        $this->var['departure_code'] = NULL;
        $this->var['arrival_code'] = NULL;
        $this->var['trip_date'] = NULL;
        $this->var['space_type'] = NULL;
        $this->var['weight'] = NULL;
        $this->var['weight_unit'] = NULL;
        $this->var['description'] = NULL;
        $this->var['price'] = NULL;
        $this->var['currency'] = NULL;
        $this->var['active'] = NULL;
        $this->var['create_time'] = NULL;

        $this->update['id'] = false;
        $this->update['user_id'] = false;
        $this->update['departure_code'] = false;
        $this->update['arrival_code'] = false;
        $this->update['trip_date'] = false;
        $this->update['space_type'] = false;
        $this->update['weight'] = false;
        $this->update['weight_unit'] = false;
        $this->update['description'] = false;
        $this->update['price'] = false;
        $this->update['currency'] = false;
        $this->update['active'] = false;
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

    public function setDepartureCode($departure_code) {
        if ($this->var['departure_code'] !== $departure_code) {
            $this->var['departure_code'] = $departure_code;
            $this->update['departure_code'] = true;
        }
    }
    public function getDepartureCode() {
        return $this->var['departure_code'];
    }

    public function setArrivalCode($arrival_code) {
        if ($this->var['arrival_code'] !== $arrival_code) {
            $this->var['arrival_code'] = $arrival_code;
            $this->update['arrival_code'] = true;
        }
    }
    public function getArrivalCode() {
        return $this->var['arrival_code'];
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

    public function setWeight($weight) {
        if ($this->var['weight'] !== $weight) {
            $this->var['weight'] = $weight;
            $this->update['weight'] = true;
        }
    }
    public function getWeight() {
        return $this->var['weight'];
    }

    public function setWeightUnit($weight_unit) {
        if ($this->var['weight_unit'] !== $weight_unit) {
            $this->var['weight_unit'] = $weight_unit;
            $this->update['weight_unit'] = true;
        }
    }
    public function getWeightUnit() {
        return $this->var['weight_unit'];
    }

    public function setDescription($description) {
        if ($this->var['description'] !== $description) {
            $this->var['description'] = $description;
            $this->update['description'] = true;
        }
    }
    public function getDescription() {
        return $this->var['description'];
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

    public function setCurrency($currency) {
        if ($this->var['currency'] !== $currency) {
            $this->var['currency'] = $currency;
            $this->update['currency'] = true;
        }
    }
    public function getCurrency() {
        return $this->var['currency'];
    }

    public function setActive($active) {
        if ($this->var['active'] !== $active) {
            $this->var['active'] = $active;
            $this->update['active'] = true;
        }
    }
    public function getActive() {
        return $this->var['active'];
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