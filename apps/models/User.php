<?php

class User {

    private $id;
    private $lastname;
    private $firstname;
    private $mail;
    private $pwd;
    private $phone;
    private $address;
    private $city;
    private $postal;
    private $birthdate;
    private $token;
    private $drivingLicense;
    private $drivingLicenseObtainDate;
    private $admin;
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

    public function setId(int $id = null) {
        $this->id = $id;
    }
    public function setLastname(string $lastname = null) {
        $this->lastname = $lastname;
    }
    public function setFirstname(string $firstname = null) {
        $this->firstname = $firstname;
    }
    public function setDrivingLicense(string $drivingLicense = null) {
        $this->drivingLicense = $drivingLicense;
    }
    public function setMail(string $mail = null) {
        $this->mail = $mail;
    }
    public function setAddress(string $address = null) {
        $this->address = $address;
    }
    public function setPostal(string $postal = null) {
        $this->postal = $postal;
    }
    public function setCity(string $city = null) {
        $this->city = $city;
    }
    public function setBirthdate(string $birthdate = null) {
        $this->birthdate = $birthdate;
    }
    public function setPwd(string $pwd = null) {
        $this->pwd = $pwd;
    }
    public function setPhone(string $phone = null) {
        $this->phone = $phone;
    }
    public function setToken(string $token = null) {
        $this->token = $token;
    }
    public function setDrivingLicenseObtainDate(string $drivingLicenseObtainDate = null) {
        $this->drivingLicenseObtainDate = $drivingLicenseObtainDate;
    }
    public function setAdmin(bool $admin) {
        $this->admin = $admin;
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
    public function getLastname() {
        return $this->lastname;
    }
    public function getFirstname() {
        return $this->firstname;
    }
    public function getDrivingLicense() {
        return $this->drivingLicense;
    }
    public function getMail() {
        return $this->mail;
    }
    public function getAddress() {
        return $this->address;
    }
    public function getPostal() {
        return $this->postal;
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
    public function getDrivingLicenseObtainDate() {
        return $this->drivingLicenseObtainDate;
    }
    public function getAdmin( ) {
        return $this->admin;
    }
    public function getArchived() {
        return$this->archived;
    }
}