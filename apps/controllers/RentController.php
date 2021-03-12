<?php

class RentController extends CI_Controller {

    public function list() {
        $dataContent['title'] = 'Nos locations';
        $dataContent['css'] = 'listRents';
        $req = $this->RentManager->getAllRents();
        foreach ($req->result() as $row) {
            $req2 = $this->CarManager->getCar($row->carsId);
            $req3 = $this->ModelManager->getModel($req2->result()[0]->modelsId);
            $req2->result()[0]->model = new Model($req3->result()[0]);
            $req4 = $this->UserManager->getUserById($row->usersId);
            $row->user = new User($req4->result()[0]);
            $row->car = new Car($req2->result()[0]);
            $rents[] = new Rent($row);
        }
        $dataContent['rents'] = $rents;
        $this->render('listRents',$dataContent);
    }

    public function insert() {
        $dataContent['title'] = 'Nouvelle location';
        $dataContent['css'] = 'newRent';
        $dataContent['cars'] = $this->CarManager->getAllCarsDispo()->result();
        $dataContent['users'] = $this->UserManager->getAllUser()->result();
        $this->render('newRent', $dataContent );
    }

    public function add() {
        $dataContent['title'] = 'Nouvelle location';
        $dataContent['css'] = 'newRent';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataRent = array(
                "dateStart" => $this->input->post('start'),
                "dateEnd" => $this->input->post('end'),
                "CarsId" => $this->input->post('car'),
                "usersId" => $this->input->post('user')
            );
            $this->form_validation->set_rules('start', 'date deb', 'required');
            $this->form_validation->set_rules('end', 'date deb', 'required');
            $this->form_validation->set_rules('car', 'date deb', 'required');
            $this->form_validation->set_rules('user', 'date deb', 'required');
            if($this->form_validation->run('')) {
                var_dump($dataRent);
                $this->RentManager->newRent($dataRent);
                redirect('UserController/index');
            }
            else {
                $dataContent['rent'] = $dataRent;
                $this->render('newRent',$dataContent);
            }
        }
        else {
            $this->render('newRent',$dataContent);
        }
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