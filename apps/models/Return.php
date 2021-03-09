<?php
class Return extends CI_Model {

	public function savereturn(array $data) {
		$this->db->insert('returns',$data); 
    }

}