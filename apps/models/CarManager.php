<?php

class CarManager extends CI_Models {
    
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

    public function updatecar(int $id, array $data) {
		$this->db->set('picture',$data['picture']);
		$this->db->set('licenceplate',$data['licenceplate']);
		$this->db->set('detail',$data['detail']);
		$this->db->set('mileage',$data['mileage']);
		$this->db->set('disponibility',$data['disponibility']);
		$this->db->where('id',$id);
		$this->db->update('cars');
    }

	public function deletecar(int $id) {
		$this->db->delete('cars', array('id'=>$id));  
    }
}