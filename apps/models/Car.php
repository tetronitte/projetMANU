<?php

class Car {
    
    private $id;
    private $picture;
    private $details;
    private $mileage;
    private $licensePlate;
    private $disponibility;
    private $model;
    private $archived;

    public function __construct($data = null) {
        if ($data != null) $this->hydrate($data);        
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
    public function setModel(Model $model) { 
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
    public function setLicensePlate(string $licensePlate) {
        $this->licensePlate = $licensePlate;
    }
    public function setDisponibility(bool $disponibility) {
        $this->disponibility = $disponibility;
    }
    public function setArchived(bool $archived) {
        $this->archived = $archived;
    }

    // =======================================================
    //                         GETTERS
    // =======================================================

    public function getId() {
        return $this->id;
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
    public function getLicensePlate() {
        return $this->licensePlate;
    }
    public function getDisponibility() {
        return $this->disponibility;
    }
    public function getArchived() {
        return$this->archived;
    }
}