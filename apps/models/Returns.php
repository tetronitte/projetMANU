<?php

class Returns {
    
    private $id;
    private $dateReturn;
    private $rentid;

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
    public function setDateReturn(string $dateReturn) {
        $this->dateReturn = $dateReturn;
    }
    public function setRentId(int $rentid) {
        $this->rentid = $rentid;
    }

    // =======================================================
    //                         GETTERS
    // =======================================================

    public function getId() {
        return $this->id;
    }
    public function getDateReturn() {
        return $this->dateReturn;
    }
    public function getRentId() {
        return $this->rentid;
    }
}