<?php

class Return extends CI_Model {

	public function saveReturn(array $data) {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }

}