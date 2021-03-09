<?php
class Rent extends CI_Model {

	public function saverent(array $data) {
		$this->db->insert('rents',$data); 
    }

}