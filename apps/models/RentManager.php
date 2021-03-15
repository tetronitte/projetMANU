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
        $this->db->order_by('dateStart','DESC');
        return $this->db->get($this->table);
    }

    public function getRentById(int $id) {
        $this->db->where('archived',0);
        $this->db->where('id',$id);
        return $this->db->get($this->table);
    }

    public function deleteRent(int $id) {
        $this->db->where('archived',0);
        $this->db->where('id',$id);
        $this->db->update($this->table,['archived' => 1]);
    }

    public function getRentByUser(int $userId) {
        $this->db->where('archived',0);
        $this->db->where('usersId',$userId);
        return $this->db->get($this->table);
    }
}