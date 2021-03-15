<?php

class ReturnManager extends CI_Model {

	public function insertReturn(array $data) {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
}