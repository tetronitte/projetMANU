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
        $dataContent['cars'] = $cars;
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
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $dataCar = array(
                    "picture" => $this->input->post('picture'),
                    "licensePlate" => $this->input->post('licensePlate'),
                    "mileage" => $this->input->post('mileage'),
                    "details" => $this->input->post('details')                    
                );
                $dataModel = array(
                    "name" => $this->input->post('name'),
                    "brand" => $this->input->post('brand'),
                    "fueltype" => $this->input->post('fueltype'),
                    "category" => $this->input->post('category'),
                    "doors" => $this->input->post('doors')
                );
                if($this->form_validation->run('updateCar')) {
                    $modelId = $this->CarManager->getCarModelId($id);
                    $this->ModelManager->updateModel($modelId, $dataModel);
                    $this->CarManager->updateCar($id, $dataCar);
                    $this->render('adminVehicles',$dataContent);
                }
                else {
                    $this->render('adminVehicles',$dataContent);
                }
            }
            else {
                $this->render('adminVehicles',$dataContent);
            }
        }
        else {
            redirect('UserController.index');
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
            $dispo = $this->CarManager->getDisponibility($id);
            if ($dispo) {
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