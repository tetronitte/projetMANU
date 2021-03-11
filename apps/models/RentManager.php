<?php
class Rent extends CI_Model {

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
        $this->db->select('rents.id, rents.dateStart, rents.dateEnd, models.name as car, users.lastname as user');
        $this->db->join('cars', 'cars.id = rents.carsId');
        $this->db->join('models', 'models.id = cars.modelsId');
        $this->db->join('users', 'users.id = rents.usersId');
        return $this->db->get($this->table);
    }

}