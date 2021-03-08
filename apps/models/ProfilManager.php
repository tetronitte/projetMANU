<?php

class ProfilManager extends CI_Models {
    
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'profils';
    }

    public function getAllProfil() {
        return $this->db->get($this->table);
    }

    public function getProfil(int $id = null, string $mail = '') {
        $this->db->where('mail',$mail);
        $this->db->or_where('id',$id);
        return $this->db->get($this->table);
    }

    public function updateProfil($data, $id) {
        $this->db->where('id',$id);
        $this->db->update($this->table,$data);
    }

    public function deleteProfil($id) {
        $this->db->where('id',$id);
        $this->db->delete($this->table);
    }

    public function insertProfil() {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }

    public function updateToken(string $token) {
        $this->db->where('id',$id);
        $this->db->update($this->table,['token' => $token]);
    }
}