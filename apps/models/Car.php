<?php

class Car {
    
    private $id;
    private $brand;
    private $picture;
    private $model;
    private $details;
    private $mileage;
    private $licencePlate;

    public function __construct($data = null) {
        if ($data != null) hydrate($ada);        
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
    public function setBrand(string $brand) {
        $this->brand = $brand;
    }
    public function setModel(string $model) {
        $this->model = $model;
    }
    public function setPicture(string $picture) {
        $this->picture = $picture;
    }
    public function setDetails(string $details) {
        $this->details = $details;
    }
    public function setMileage(int $mileage) {
        $this->mileage = $mileage;
    }
    public function setLicencePlate(string $licencePlate) {
        $this->licencePlate = $licencePlate;
    }

    // =======================================================
    //                         GETTERS
    // =======================================================

    public function getId(int $id) {
        return $this->id = $id;
    }
    public function getBrand() {
        return $this->brand;
    }
    public function getModel() {
        return $this->model;
    }
    public function getPicture() {
        return $this->picture;
    }
    public function getDetails() {
        return $this->details;
    }
    public function getMileage() {
        return $this->mileage;
    }
    public function getLicencePlate() {
        return $this->licencePlate;
    }
}