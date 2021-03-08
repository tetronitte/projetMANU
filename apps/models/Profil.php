<?php

class Profil {

    private $id;
    private $lastname;
    private $firstname;
    private $mail;
    private $pwd;
    private $phone;
    private $adress;
    private $city;
    private $birthdate;
    private $token;
    private $drivingLicence;
    private $drivingLicenceObtainDate;
    public $admin;

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
    public function setLastname(string $lastname) {
        $this->lastname = $lastname;
    }
    public function setFirstname(string $firstname) {
        $this->firstname = $firstname;
    }
    public function setDrivingLicence(string $drivingLicence) {
        $this->drivingLicence = $drivingLicence;
    }
    public function setMail(string $mail) {
        $this->mail = $mail;
    }
    public function setAdress(string $adress) {
        $this->adress = $adress;
    }
    public function setCity(string $city) {
        $this->city = $city;
    }
    public function setBirthdate(date $birthdate) {
        $this->birthdate = $birthdate;
    }
    public function setPwd(string $pwd) {
        $this->pwd = $pwd;
    }
    public function setPhone(string $phone) {
        $this->phone = $phone;
    }
    public function setToken(string $token) {
        $this->token = $token;
    }
    public function setDrivingLicenceObtainDate(date $drivingLicenceObtainDate) {
        $this->drivingLicenceObtainDate = $drivingLicenceObtainDate;
    }
    public function setAdmin(bool $admin) {
        $this->admin = $admin;
    }

    // =======================================================
    //                         GETTERS
    // =======================================================

    public function getId() {
        return $this->id;
    }
    public function getLastname() {
        return $this->lastname;
    }
    public function getFirstname() {
        return $this->firstname;
    }
    public function getDrivingLicence() {
        return $this->driving_licence;
    }
    public function getMail() {
        return $this->mail;
    }
    public function getAdress() {
        return $this->adress;
    }
    public function getCity() {
        return $this->city;
    }
    public function getBirthdate() {
        return $this->birthdate;
    }
    public function getPwd() {
        return $this->pwd;
    }
    public function getPhone() {
        return $this->phone;
    }
    public function getToken() {
        return $this->token ;
    }
    public function getDrivingLicenceObtainDate() {
        return $this->drivingLicenceObtainDate;
    }
    public function getAdmin( ) {
        return $this->admin;
    }
}