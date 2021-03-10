<?php

class Rent {
    
    private $id;
    private $dateStart;
    private $dateEnd;
    private $price;
    private $userid;
    private $carid;

    public function __construct($data = null) {
        if ($data != null) hydrate($data);        
    }

    private function hydrate($data) {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // =======================================================
    //                         SETTERS
    // =======================================================

    public function setId(int $id) {
        $this->id = $id;
    }
    public function setDateStart(date $dateStart) {
        $this->dateStart = $dateStart;
    }
    public function setDateEnd(date $dateEnd) {
        $this->dateEnd = $DateEnd;
    }
    public function setPrice(string $price) {
        $this->price = $price;
    }
    public function setUserId(string $userid) {
        $this->userid = $userid;
    }
    public function setCarId(int $carid) {
        $this->carid = $carid;
    }

    // =======================================================
    //                         GETTERS
    // =======================================================

    public function getId(int $id) {
        return $this->id;
    }
    public function getDateStart() {
        return $this->dateStart;
    }
    public function getDateEnd() {
        return $this->dateEnd;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getUserId() {
        return $this->userid;
    }
    public function getCarId() {
        return $this->carid;
    }
}