<?php
class Rent extends CI_Model {

	public function saveRent(array $data) {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }

}