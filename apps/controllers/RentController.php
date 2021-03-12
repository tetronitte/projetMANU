<?php

class RentController extends CI_Controller {

    public function list() {
        $dataContent['title'] = 'Nos locations';
        $dataContent['css'] = 'style';
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

    public function deleteRent(int $id) {
        $req = $this->UserManager->getRentById($id);
        $rent = new Rent($req->result()[0]);
        $today = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
        $rentStart = $rent->getDateStart();
        if ($today < $rentStart) {
            $this->RentManager->deleteRent($id);
        }
        else {
            $this->session->set_userdata('errorDeleteRent','Cette location est en cours.');
        }
        redirect('RentController/list');
    }

    public function insert() {
        $dataContent['title'] = 'Nos locations';
        $dataContent['css'] = 'style';
        $this->render('newRent', $dataContent );
    }

    public function add() {
        $dataContent['title'] = 'Inscription';
        $dataContent['css'] = 'signin';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataRent = array(
                "dateStart" => $this->input->post('firstname'),
                "dateEnd" => $this->input->post('lastname'),
                "CarsId" => $this->input->post('birthdate'),
                "usersId" => $this->input->post('phone')
            );
            if($this->form_validation->run('register')) {
               /* $password = password_hash($dataUser['pwd'],PASSWORD_DEFAULT);
                $dataUser['pwd'] = $password;
                unset($dataUser['verifPwd']);*/

                $this->RentManager->newRent($dataRent);
                
                redirect('UserController/index');
            }
            else {
                $dataContent['rent'] = $dataRent;
                $this->render('add',$dataContent);
            }
        }
        else {
            $this->render('add',$dataContent);
        }
    }

    private function render($file, $data) {
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$data);
        $this->load->view($file,$data);
        $this->load->view('templates/footer',$data);
    }
}