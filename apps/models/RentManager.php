<?php
class RentManager extends CI_Model {

    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'rents';
    }

    public function insertRent(array $data) {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }

    public function getAllRents(string $search) {
        $this->db->join('users', 'users.id = rents.usersId');
        $this->db->join('cars', 'cars.id = rents.carsId');
        $this->db->join('models', 'models.id = cars.modelsId');
        $this->db->where("(models.name LIKE '%".$search."%' OR users.firstname LIKE '%".$search."%' OR users.lastname LIKE '%".$search."%' OR rents.dateStart LIKE '%".$search."%' OR rents.dateEnd LIKE '%".$search."%')");
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

    public function updateNumRent(string $numRent, int $id) {
        $this->db->where('archived',0);
        $this->db->where('id',$id);
        $this->db->update($this->table,['numRent' => $numRent]);
    }

    public function getRentByNum(string $numRent) {
        $this->db->where('archived',0);
        $this->db->where('numRent',$numRent);
        return $this->db->get($this->table);
    }
}