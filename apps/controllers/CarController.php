<?php

/**
 * CarController
 */
class CarController extends CI_Controller {
        
    /**
     * list
     *
     * @return void
     */
    public function list() {
        $dataContent['title'] = 'Notre garage';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $search = $this->input->post('search');
        }
        else {
            if (isset($this->session->search)) {
                $search = $this->session->search;                    
            }
            else {
                $search = '';
            }
        }
        $req = $this->CarManager->getAllCars($search);
        foreach ($req->result() as $row) {
            $req2 = $this->ModelManager->getModel($row->model);
            $row->model = new Model($req2->result()[0]);
            $cars[] = new Car($row);
        }
        if (!empty($cars))$dataContent['cars'] = $cars;
        $dataContent['search'] = $search;
        if (isset($this->session->admin)) {
			$dataContent['css'] = 'adminVehicles';
            $this->render('adminVehicles',$dataContent);
        }
        else {
		    $dataContent['css'] = 'listVehicles';
            $this->render('listVehicles',$dataContent);
        }
    }
    
    /**
     * updateCar
     *
     * @param  mixed $id
     * @return void
     */
    public function updateCar(int $id) {
        if (isset($this->session->admin)) {
            $dataContent['title'] = 'Modifer voiture';
            $dataContent['css'] = 'adminVehicles';
            $req = $this->CarManager->getCarById($id);
            $reqModel = $this->ModelManager->getModel($req->result()[0]->modelsId);
            $req->result()[0]->model = new Model($reqModel->result()[0]);
            $car = new Car($req->result()[0]);
            $dataContent['car'] = $car;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $dataCar = array(
                    //"picture" => $this->input->post('picture'),
                    "licensePlate" => $this->input->post('licensePlate'),
                    "mileage" => $this->input->post('mileage'),
                    "details" => $this->input->post('details')                    
                );
                if($this->form_validation->run('updateCar')) {
                    $this->CarManager->updateCar($id, $dataCar);
                    redirect('CarController/list');
                }
                else {
                    $this->render('updateVehicles',$dataContent);
                }
            }
            else {
                $this->render('updateVehicles',$dataContent);
            }
        }
        else {
            redirect('UserController/index');
        }
    }
      
    /**
     * deleteCar
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteCar(int $id) {
        if(isset($this->session->admin)) {
            $req = $this->CarManager->getDisponibility($id);
            if ($req->result()[0]->disponibility) {
                $this->CarManager->deleteCar($id);
            }
            else {
                $this->session->set_userdata('errorDeleteCar','Cette voiture n\a pas encore été retournée.');
            }
            redirect('CarController/list');
        }
        else {
            redirect('UserController/index');
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