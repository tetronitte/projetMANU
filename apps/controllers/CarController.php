<?php

class CarController extends CI_Controller {
    
    public function list() {
        $dataContent['title'] = 'Notre garage';
        $dataContent['css'] = 'style';
        $req = $this->CarManager->getAllCars();
        foreach ($req->result() as $row) {
            $req2 = $this->ModelManager->getModel($row->id);
            $row->model = new Model($req2->result()[0]);
            $cars[] = new Car($row);
        }
        $dataContent['cars'] = $cars;
        $this->render('list',$dataContent);
    }

    private function render($file, $data) {
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$data);
        $this->load->view($file,$data);
        $this->load->view('templates/footer',$data);
    }
}