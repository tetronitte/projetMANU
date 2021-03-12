<?php

class ReturnManager extends CI_Model {

	public function addReturn(array $data) {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }

}