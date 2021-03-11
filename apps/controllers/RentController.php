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
        $this->load->model('UserManager');
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

    // public function cancelRent(int $id) {
    //     $req = $this->RentManager($id);
    //     $rent = new Rent($req->result()[0]);
    //     $today = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
    //     $rentStart = $rent->getDateStart();
    //     if ($today < $rentStart) {
    //         $this->RentManager->deleteRent($id);
    //     }
        
    //     redirect('RentController/lists');
    // }

    private function render($file, $data) {
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$data);
        $this->load->view($file,$data);
        $this->load->view('templates/footer',$data);
    }
}