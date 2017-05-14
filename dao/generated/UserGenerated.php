<?php
abstract class UserGenerated extends AirlolDaoBase {

    public static $table = 'user';

    protected function init() {
        $this->var['id'] = 0;
        $this->var['email'] = NULL;
        $this->var['password'] = NULL;
        $this->var['name'] = NULL;
        $this->var['profile_img'] = NULL;
        $this->var['birth_day'] = NULL;
        $this->var['tel'] = NULL;
        $this->var['whatsapp'] = NULL;
        $this->var['wechat'] = NULL;
        $this->var['preferred_language'] = NULL;
        $this->var['preferred_currency'] = NULL;
        $this->var['preferred_timezone'] = NULL;
        $this->var['preferred_method'] = NULL;
        $this->var['living_city'] = NULL;
        $this->var['self_description'] = NULL;
        $this->var['response_count'] = NULL;
        $this->var['response_time'] = NULL;
        $this->var['rate_trip_count'] = NULL;
        $this->var['rate_trip_value'] = NULL;
        $this->var['rate_good_count'] = NULL;
        $this->var['rate_good_value'] = NULL;
        $this->var['create_time'] = NULL;

        $this->update['id'] = false;
        $this->update['email'] = false;
        $this->update['password'] = false;
        $this->update['name'] = false;
        $this->update['profile_img'] = false;
        $this->update['birth_day'] = false;
        $this->update['tel'] = false;
        $this->update['whatsapp'] = false;
        $this->update['wechat'] = false;
        $this->update['preferred_language'] = false;
        $this->update['preferred_currency'] = false;
        $this->update['preferred_timezone'] = false;
        $this->update['preferred_method'] = false;
        $this->update['living_city'] = false;
        $this->update['self_description'] = false;
        $this->update['response_count'] = false;
        $this->update['response_time'] = false;
        $this->update['rate_trip_count'] = false;
        $this->update['rate_trip_value'] = false;
        $this->update['rate_good_count'] = false;
        $this->update['rate_good_value'] = false;
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

    public function setProfileImg($profile_img) {
        if ($this->var['profile_img'] !== $profile_img) {
            $this->var['profile_img'] = $profile_img;
            $this->update['profile_img'] = true;
        }
    }
    public function getProfileImg() {
        return $this->var['profile_img'];
    }

    public function setBirthDay($birth_day) {
        if ($this->var['birth_day'] !== $birth_day) {
            $this->var['birth_day'] = $birth_day;
            $this->update['birth_day'] = true;
        }
    }
    public function getBirthDay() {
        return $this->var['birth_day'];
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

    public function setWhatsapp($whatsapp) {
        if ($this->var['whatsapp'] !== $whatsapp) {
            $this->var['whatsapp'] = $whatsapp;
            $this->update['whatsapp'] = true;
        }
    }
    public function getWhatsapp() {
        return $this->var['whatsapp'];
    }

    public function setWechat($wechat) {
        if ($this->var['wechat'] !== $wechat) {
            $this->var['wechat'] = $wechat;
            $this->update['wechat'] = true;
        }
    }
    public function getWechat() {
        return $this->var['wechat'];
    }

    public function setPreferredLanguage($preferred_language) {
        if ($this->var['preferred_language'] !== $preferred_language) {
            $this->var['preferred_language'] = $preferred_language;
            $this->update['preferred_language'] = true;
        }
    }
    public function getPreferredLanguage() {
        return $this->var['preferred_language'];
    }

    public function setPreferredCurrency($preferred_currency) {
        if ($this->var['preferred_currency'] !== $preferred_currency) {
            $this->var['preferred_currency'] = $preferred_currency;
            $this->update['preferred_currency'] = true;
        }
    }
    public function getPreferredCurrency() {
        return $this->var['preferred_currency'];
    }

    public function setPreferredTimezone($preferred_timezone) {
        if ($this->var['preferred_timezone'] !== $preferred_timezone) {
            $this->var['preferred_timezone'] = $preferred_timezone;
            $this->update['preferred_timezone'] = true;
        }
    }
    public function getPreferredTimezone() {
        return $this->var['preferred_timezone'];
    }

    public function setPreferredMethod($preferred_method) {
        if ($this->var['preferred_method'] !== $preferred_method) {
            $this->var['preferred_method'] = $preferred_method;
            $this->update['preferred_method'] = true;
        }
    }
    public function getPreferredMethod() {
        return $this->var['preferred_method'];
    }

    public function setLivingCity($living_city) {
        if ($this->var['living_city'] !== $living_city) {
            $this->var['living_city'] = $living_city;
            $this->update['living_city'] = true;
        }
    }
    public function getLivingCity() {
        return $this->var['living_city'];
    }

    public function setSelfDescription($self_description) {
        if ($this->var['self_description'] !== $self_description) {
            $this->var['self_description'] = $self_description;
            $this->update['self_description'] = true;
        }
    }
    public function getSelfDescription() {
        return $this->var['self_description'];
    }

    public function setResponseCount($response_count) {
        if ($this->var['response_count'] !== $response_count) {
            $this->var['response_count'] = $response_count;
            $this->update['response_count'] = true;
        }
    }
    public function getResponseCount() {
        return $this->var['response_count'];
    }

    public function setResponseTime($response_time) {
        if ($this->var['response_time'] !== $response_time) {
            $this->var['response_time'] = $response_time;
            $this->update['response_time'] = true;
        }
    }
    public function getResponseTime() {
        return $this->var['response_time'];
    }

    public function setRateTripCount($rate_trip_count) {
        if ($this->var['rate_trip_count'] !== $rate_trip_count) {
            $this->var['rate_trip_count'] = $rate_trip_count;
            $this->update['rate_trip_count'] = true;
        }
    }
    public function getRateTripCount() {
        return $this->var['rate_trip_count'];
    }

    public function setRateTripValue($rate_trip_value) {
        if ($this->var['rate_trip_value'] !== $rate_trip_value) {
            $this->var['rate_trip_value'] = $rate_trip_value;
            $this->update['rate_trip_value'] = true;
        }
    }
    public function getRateTripValue() {
        return $this->var['rate_trip_value'];
    }

    public function setRateGoodCount($rate_good_count) {
        if ($this->var['rate_good_count'] !== $rate_good_count) {
            $this->var['rate_good_count'] = $rate_good_count;
            $this->update['rate_good_count'] = true;
        }
    }
    public function getRateGoodCount() {
        return $this->var['rate_good_count'];
    }

    public function setRateGoodValue($rate_good_value) {
        if ($this->var['rate_good_value'] !== $rate_good_value) {
            $this->var['rate_good_value'] = $rate_good_value;
            $this->update['rate_good_value'] = true;
        }
    }
    public function getRateGoodValue() {
        return $this->var['rate_good_value'];
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