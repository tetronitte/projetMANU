<?php

class ReturnManager extends CI_Model {

    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'returns';
    }

	public function insertReturn(array $data) {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
}