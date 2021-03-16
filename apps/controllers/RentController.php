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
    public function list() {//TODO SEARCH
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
    public function addRent() {//TODO VÉRIFICATION FORMULAIRE
        if(isset($this->session->admin)) {
            $dataContent['title'] = 'Nouvelle location';
            $dataContent['css'] = 'registerRentAdmin';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $dataRent = array(
                    "dateStart" => $this->input->post('dateStart'),
                    "dateEnd" => $this->input->post('dateEnd'),
                    "licensePlate" => $this->input->post('licensePlate'),
                    "mail" => $this->input->post('mail')
                );
                if($this->form_validation->run('addRent')) {
                    $reqUser = $this->UserManager->getUserByMail($dataRent['mail']);
                    $user = new User($reqUser->result()[0]);
                    $reqCar = $this->CarManager->getCarByLicensePlate($dataRent['licensePlate']);
                    $reqModel = $this->ModelManager->getModel($reqCar->result()[0]->modelsId);
                    $reqCar->result()[0]->model = new Model($reqModel->result()[0]);
                    $car = new Car($reqCar->result()[0]);
                    $dataRent['carsId'] = $car->getId();
                    $dataRent['usersId'] = $user->getId();
                    unset($dataRent['licensePlate']);
                    unset($dataRent['mail']);
                    $id = $this->RentManager->insertRent($dataRent);
                    $numRent = $this->generateNumRent($car,$user,$id);
                    $this->RentManager->updateNumRent($numRent,$id);
                    redirect('RentControlelr/addRent');
                }
                else {
                    $dataContent['rent'] = $dataRent;
                    $this->render('registerRentAdmin',$dataContent);
                }
            }
            else {
                $this->render('registerRentAdmin',$dataContent);
            }
        }
        else {
            $this->render('registerRentAdmin',$dataContent);
        }
    }
  
    private function generateNumRent(Car $car, User $user,int $id) {
        $prefixUser = strtoupper(substr($user->getMail(),0,3));
        $prefixBrand = strtoupper(substr($car->getModel()->getBrand(),0,3));
        $padding = str_pad($id, 5, "0", STR_PAD_LEFT);
        $numRent = $prefixBrand.$padding.$prefixUser;
        return $numRent;
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