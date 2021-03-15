<?php

class UserManager extends CI_Model {
    
    private $table;

    public function __construct() {
        parent::__construct();
        $this->table = 'users';
    }

    public function getAllUser() {
        $this->db->where('archived',0);
        return $this->db->get($this->table);
    }

    public function getAllUserNotAdmin(string $search = '',int $offset = 0) {
        $this->db->from($this->table);
        $this->db->where('admin',0);
        $this->db->where('archived',0);
        $this->db->where("(lastname LIKE '%".$search."%' OR firstname LIKE '%".$search."%')");
        $this->db->order_by('lastname', 'ASC');
        $this->db->limit(5);
        $this->db->offset($offset);
        return $this->db->get();
    }

    public function getUserById(int $id) {
        $this->db->where('id',$id);
        $this->db->where('archived',0);
        return $this->db->get($this->table);
    }

    public function getUserByMail(string $mail) {
        $this->db->where('mail',$mail);
        $this->db->where('archived',0);
        return $this->db->get($this->table);
    }

    public function updateUser($data, int $id) {
        $this->db->where('id',$id);
        $this->db->where('archived',0);
        $this->db->update($this->table,$data);
    }

    public function deleteUser(int $id) {
        $archived['archived'] = 1;
        $this->db->where('id',$id);
        $this->db->update($this->table,$archived);
    }

    public function insertUser($data) {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }

    public function updateToken(int $id, string $token) {
        $this->db->where('id',$id);
        $this->db->where('archived',0);
        $this->db->update($this->table,['tokenAutolog' => $token]);
    }

    public function updatePassword(int $id, string $password) {
        $this->db->where('id',$id);
        $this->db->where('archived',0);
        $this->db->update($this->table,['pwd' => $password]);
    }

    public function getToken() {
        $this->db->select('tokenAutolog');
        $this->db->where('archived',0);
        $this->db->get($this->table);
    }

    public function count(string $search = '') {
        $this->db->select('CEIL(COUNT(id)) AS count');
        $this->db->from($this->table);
        $this->db->where('admin',0);
        $this->db->where('archived',0);
        $this->db->where("(lastname LIKE '%".$search."%' OR firstname LIKE '%".$search."%')");
        return $this->db->get();
    }

    public function countRentInProgress(int $id) {
        $currentDate = date('Y-m-d');
        $this->db->select('CEIL(COUNT(rents.id)) AS count');
        $this->db->from($this->table);
        $this->db->join('rents', 'rents.usersId = '.$this->table.'.id');
        $this->db->where('users.id',$id);
        $this->db->where('archived',0);
        $this->db->where('rents.dateStart <= ',$currentDate);
        $this->db->where('rents.dateEnd >= ',$currentDate);
        return $this->db->get();
    }
}