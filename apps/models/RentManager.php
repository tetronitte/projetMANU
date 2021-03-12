<?php
class RentManager extends CI_Model {

    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'rents';
    }

    public function newRent(array $data) {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }

    public function getAllRents() {

        return $this->db->get($this->table);
    }

    public function deleteRent(int $id) {
        $this->db->where('id',$id);
        $this->db->delete($this->table);
    }

}