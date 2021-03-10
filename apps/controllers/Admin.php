<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

	public function deleteCar(int $id) {

		$this->CarManager->deleteCar($id);
		$this->render();
	}

	private function render($file, $data) {
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$data);
        $this->load->view($file,$data);
        $this->load->view('templates/footer',$data);
    }
}
