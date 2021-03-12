<?php

class Model {
    
    private $id;
    private $name;
    private $brand;
    private $fueltype;
    private $category;
    private $doors;

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
    public function setName(string $name) {
        $this->name = $name;
    }
    public function setBrand(string $brand) {
        $this->brand = $brand;
    }
    public function setFueltype(string $fueltype) {
        $this->fueltype = $fueltype;
    }
    public function setCategory(string $category) {
        $this->category = $category;
    }
    public function setDoors(string $doors) {
        $this->doors = $doors;
    }

    // =======================================================
    //                         GETTERS
    // =======================================================

    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getBrand() {
        return $this->brand;
    }
    public function getFueltype() {
        return $this->fueltype;
    }
    public function getCategory() {
        return $this->category;
    }
    public function getDoors() {
        return $this->doors;
    }
}