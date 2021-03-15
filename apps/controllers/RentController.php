<?php

/**
 * RentController
 */
class RentController extends CI_Controller {
    
    /**
     * list
     *
     * @return void
     */
    public function list() {
        $dataContent['title'] = 'Nos locations';
        if(isset($this->session->admin)){
            $dataContent['css'] = 'adminRent';
            $reqRent = $this->RentManager->getAllRents();
        }
        else {
            $dataContent['css'] = 'userRent';
            $reqRent = $this->RentManager->getRentByUser((int)$this->session->id);
        }
        foreach ($reqRent->result() as $row) {
            $reqCar = $this->CarManager->getCarById($row->carsId);
            $reqModel = $this->ModelManager->getModel($reqCar->result()[0]->modelsId);
            $reqCar->result()[0]->model = new Model($reqModel->result()[0]);
            $reqUser = $this->UserManager->getUserById($row->usersId);
            $row->user = new User($reqUser->result()[0]);
            $row->car = new Car($reqCar->result()[0]);
            $rents[] = new Rent($row);
        }
        if(!empty($rents)) $dataContent['rents'] = $rents;
        if(isset($this->session->admin)){
            $this->render('adminRent',$dataContent);
        }
        else {
            $this->render('userRent',$dataContent);
        }
    }
    
    /**
     * deleteRent
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteRent(int $id) {
        $req = $this->RentManager->getRentById($id);
        $reqCar = $this->CarManager->getCarById($req->result()[0]->carsId);
        $req->result()[0]->car = new Car($reqCar->result()[0]);
        $rent = new Rent($req->result()[0]);
        $today = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
        $rentStart = strtotime($rent->getDateStart());
        $disponibility = $rent->getCar()->getDisponibility();
        if ($disponibility && $today < $rentStart) {
            $this->RentManager->deleteRent($id);
        }
        else {
            $this->session->set_userdata('errorDeleteRent','Cette location est en cours.');
        }
        redirect('RentController/list');
    }
    
    /**
     * add
     *
     * @return void
     */
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
            $this->form_validation->set_rules('start', 'Date deb', 'required');
            $this->form_validation->set_rules('end', 'Date fin', 'required');
            $this->form_validation->set_rules('car', 'Voiture', 'required');
            $this->form_validation->set_rules('user', 'Client', 'required');
            if($this->form_validation->run('')) {
                 var_dump($dataRent);
                $this->RentManager->newRent($dataRent);
                $this->CarManager->notDispo($dataRent['CarsId']);
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
  
    /**
     * render
     *
     * @param  mixed $file
     * @param  mixed $data
     * @return void
     */
    private function render(string $file, array $data) {
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$data);
        $this->load->view($file,$data);
        $this->load->view('templates/footer',$data);
    }
}