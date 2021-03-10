<?php

class CarManager extends CI_Model {
    
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'cars';
    }

    public function getAllCars() {
        $this->db->select('id, picture, licensePlate, mileage, disponibility, details, modelsId AS model');
        return $this->db->get($this->table);
    }

    public function getCar(int $id = null, string $model = '') {
        $this->db->join('models', 'models.id = cars.modelsId');
        $this->db->where('models.name',$model);
        $this->db->or_where('id',$id);
        return $this->db->get($this->table);
    }

    public function disponibility(int $id) {
        // $this->db->join('models', 'models.id = cars.modelsId');
        // $this->db->where('models.name',$model);
        // $this->db->or_where('id',$id);
        // return $this->db->get($this->table);
    }

    public function updateCar(int $id, array $data) {
        $this->db->where('id',$id);
        $this->db->update($this->table,$data);
    }

	public function deleteCar(int $id) {
        $this->db->where('id',$id);
        $this->db->delete($this->table);  
    }

}