<?php

class UserManager extends CI_Model {
    
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'users';
    }

    public function getAllUser() {
        return $this->db->get($this->table);
    }

    public function getUserById(int $id) {
        $this->db->where('id',$id);
        return $this->db->get($this->table);
    }

    public function getUserByMail(string $mail) {
        $this->db->where('mail',$mail);
        return $this->db->get($this->table);
    }

    public function updateUser($data, $id) {
        $this->db->where('id',$id);
        $this->db->update($this->table,$data);
    }

    public function deleteUser($id) {
        $this->db->where('id',$id);
        $this->db->delete($this->table);
    }

    public function insertUser($data) {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }

    public function updateToken(int $id, string $token) {
        $this->db->where('id',$id);
        $this->db->update($this->table,['tokenAutolog' => $token]);
    }
}