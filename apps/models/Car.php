<?php

class Car {
    
    private $id;
    private $lastname;
    private $firstname;
    private $drivingLicence;

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

    public function setId(int $id) {
        $this->id = $id;
    }
    public function setLastname(string $lastname) {
        $this->lastname = $lastname;
    }
    public function setFirstname(string $firstname) {
        $this->firstname = $firstname;
    }
    public function setDrivingLicence(string $drivingLicence) {
        $this->drivingLicence = $drivingLicence;
    }


    
    public function getId() {
        $this->id;
    }
    public function getLastname() {
        $this->lastname;
    }
    public function getFirstname() {
        $this->firstname;
    }
    public function getDrivingLicence() {
        $this->driving_licence;
    }
}