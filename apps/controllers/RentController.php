<?php

class RentController extends CI_Controller {

    public function list() {
        $dataContent['title'] = 'Nos locations';
        $dataContent['css'] = 'style';
        $rents = $this->RentManager->getAllRents();
        $dataContent['rents'] = $rents->result();
        $this->render('listRents',$dataContent);
    }

    public function add() {
        $dataContent['title'] = 'Nouvelle location';
        $dataContent['css'] = 'style';
        $users = $this->UserManager->getAllUser();
        $dataContent['users'] = $users->result();
        $this->render('newRent', $dataContent);
    }

    public function insert() {
        $dataContent['title'] = 'Nouvelle location';
        $dataContent['css'] = 'style';
        $this->render('newRent', $dataContent);
    }

    public function cancelRent() {

    }

    private function render($file, $data) {
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$data);
        $this->load->view($file,$data);
        $this->load->view('templates/footer',$data);
    }
}