<?php

class ModelManager extends CI_Model {
    
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'models';
    }

    public function getModel(int $id) {
        $this->db->select('brands.name AS brand, fueltype.type AS fueltype, doors.number AS doors, categories.name AS category, models.name AS name, models.id AS id');
        $this->db->from($this->table);
        $this->db->join('brands', 'brands.id = models.brandsId');
        $this->db->join('fueltype', 'fueltype.id = models.fueltypeId');
        $this->db->join('categories', 'categories.id = models.categoriesId');
        $this->db->join('doors', 'doors.id = models.doorsId');
        $this->db->where('models.id',$id);
        return $this->db->get();
    }
}