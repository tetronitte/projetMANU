<?php

/**
 * CarManager
 */
class CarManager extends CI_Model {
    
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'cars';
    }

    public function getAllCars(string $search) {
        $this->db->select('cars.id, picture, licensePlate, mileage, disponibility, details, modelsId AS model');
        $this->db->join('models', 'models.id = cars.modelsId');
        $this->db->join('brands', 'brands.id = models.brandsId');
        $this->db->join('fueltype', 'fueltype.id = models.fueltypeId');
        $this->db->join('categories', 'categories.id = models.categoriesId');
        $this->db->where("(brands.name LIKE '%".$search."%' OR models.name LIKE '%".$search."%' OR fueltype.type LIKE '%".$search."%' OR categories.name LIKE '%".$search."%')");
        return $this->db->get($this->table);
    }

    public function getAllCarsDispo() {
        $this->db->select('cars.id, cars.picture, cars.licensePlate, cars.mileage, cars.disponibility, cars.details, cars.modelsId, models.name');
        $this->db->join('models', 'models.id = cars.modelsId');
        $this->db->where('cars.disponibility','1');
        return $this->db->get($this->table);
    }

    public function getCar(int $id = null, string $model = '') {
        $this->db->join('models', 'models.id = cars.modelsId');
        $this->db->where('models.name',$model);
        $this->db->or_where('cars.id',$id);
        return $this->db->get($this->table);
    }

    public function getCarById(int $id = null) {
        return $this->db->get($this->table);
    }

    public function disponibility(int $id) {
        $this->db->select('disponibility');
        $this->db-where('id','$id');
        return $this->db->get($this->table);
    }

    public function getCarModelId(int $id) {
        $this->db->select('modelsId');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        return $this->db->get();
    }

    public function notDispo(int $id) {
        $this->db->set('disponibility','0');
        $this->db->where('id',$id);
        $this->db->update($this->table);
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