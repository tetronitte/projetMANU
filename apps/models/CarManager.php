<?php

class CarManager extends CI_Model {
    
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'cars';
    }

    public function getAllProfil() {
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
}