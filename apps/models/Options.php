<?php

class Options {

    private $tokenSize;
    private $tokenTime;
    private $regexName;
    private $regexPhone;
    private $regexPassword;

    public function __construct() {
        $req = $this->OptionsManager->getAllOptions();
        foreach ($req->result() as $row) {
            $data[$row['name']] = $row['value'];
        }
        $this->hydrate($ada);
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

    public function setTokenSize(int $tokenSize) {
        $this->tokenSize = $tokenSize;
    }
    public function setTokenTime(int $tokenTime) {
        $this->tokenTime = $tokenTime;
    }
    public function setRegexName(string $regexPassword) {
        $this->regexPassword = $regexPassword;
    }
    public function setRegexPassword(string $regexPassword) {
        $this->regexPassword = $regexPassword;
    }
    public function setRegexPhone(string $regexPassword) {
        $this->regexPassword = $regexPassword;
    }

    // =======================================================
    //                         GETTERS
    // =======================================================

    public function getTokenSize() {
        $this->tokenSize;
    }
    public function getTokenTime() {
        $this->tokenTime;
    }
    public function getRegexName() {
        $this->regexPassword;
    }
    public function getRegexPassword() {
        $this->regexPassword;
    }
    public function getRegexPhone() {
        $this->regexPassword;
    }
}