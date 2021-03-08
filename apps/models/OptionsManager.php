<?php

class OptionsManager extends CI_Models {

    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'options';
    }

    public function getAllOptions() {
        return $this->db->get($this->table);
    }
}