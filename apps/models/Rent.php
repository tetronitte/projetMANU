<?php

class Rent {
    
    private $id;
    private $dateStart;
    private $dateEnd;
    private $user;
    private $car;

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
    public function setDateStart(string $dateStart) {
        $this->dateStart = $dateStart;
    }
    public function setDateEnd(string $dateEnd) {
        $this->dateEnd = $DateEnd;
    }
    public function setUser(User $user) {
        $this->user = $user;
    }
    public function setCar(Car $car) {
        $this->car = $car;
    }

    // =======================================================
    //                         GETTERS
    // =======================================================

    public function getId() {
        return $this->id;
    }
    public function getDateStart() {
        return $this->dateStart;
    }
    public function getDateEnd() {
        return $this->dateEnd;
    }
    public function getUser() {
        return $this->user;
    }
    public function getCarId() {
        return $this->car;
    }
}