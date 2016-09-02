<?php
abstract class GoodGenerated extends AirlolDaoBase {

    public static $table = 'good';

    protected function init() {
        $this->var['id'] = 0;
        $this->var['user_id'] = NULL;
        $this->var['departure_code'] = NULL;
        $this->var['arrival_code'] = NULL;
        $this->var['end_date'] = NULL;
        $this->var['good_type'] = NULL;
        $this->var['good_unit'] = NULL;
        $this->var['good_price'] = NULL;
        $this->var['description'] = NULL;
        $this->var['price'] = NULL;
        $this->var['price_adjust'] = NULL;
        $this->var['active'] = NULL;
        $this->var['contact_type'] = NULL;
        $this->var['create_time'] = NULL;

        $this->update['id'] = false;
        $this->update['user_id'] = false;
        $this->update['departure_code'] = false;
        $this->update['arrival_code'] = false;
        $this->update['end_date'] = false;
        $this->update['good_type'] = false;
        $this->update['good_unit'] = false;
        $this->update['good_price'] = false;
        $this->update['description'] = false;
        $this->update['price'] = false;
        $this->update['price_adjust'] = false;
        $this->update['active'] = false;
        $this->update['contact_type'] = false;
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

    public function setEndDate($end_date) {
        if ($this->var['end_date'] !== $end_date) {
            $this->var['end_date'] = $end_date;
            $this->update['end_date'] = true;
        }
    }
    public function getEndDate() {
        return $this->var['end_date'];
    }

    public function setGoodType($good_type) {
        if ($this->var['good_type'] !== $good_type) {
            $this->var['good_type'] = $good_type;
            $this->update['good_type'] = true;
        }
    }
    public function getGoodType() {
        return $this->var['good_type'];
    }

    public function setGoodUnit($good_unit) {
        if ($this->var['good_unit'] !== $good_unit) {
            $this->var['good_unit'] = $good_unit;
            $this->update['good_unit'] = true;
        }
    }
    public function getGoodUnit() {
        return $this->var['good_unit'];
    }

    public function setGoodPrice($good_price) {
        if ($this->var['good_price'] !== $good_price) {
            $this->var['good_price'] = $good_price;
            $this->update['good_price'] = true;
        }
    }
    public function getGoodPrice() {
        return $this->var['good_price'];
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

    public function setPriceAdjust($price_adjust) {
        if ($this->var['price_adjust'] !== $price_adjust) {
            $this->var['price_adjust'] = $price_adjust;
            $this->update['price_adjust'] = true;
        }
    }
    public function getPriceAdjust() {
        return $this->var['price_adjust'];
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

    public function setContactType($contact_type) {
        if ($this->var['contact_type'] !== $contact_type) {
            $this->var['contact_type'] = $contact_type;
            $this->update['contact_type'] = true;
        }
    }
    public function getContactType() {
        return $this->var['contact_type'];
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