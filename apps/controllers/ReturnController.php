<?php

/**
 * ReturnController
 */
class ReturnController extends CI_Controller {
    
    /**
     * addReturn
     *
     * @return void
     */
    public function addReturn() {
        if(isset($this->session->admin)) {
            $dataContent['title'] = 'Ajouter un retour';
            $dataContent['css'] = 'style';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->form_validation->run('signin')) {
                    $dateReturn = $this->input->post('dateReturn');
                    $userId = $this->input->post('user');
                    $carId = $this->input->post('car');
                    $req = $this->RentManager($userId,$carId);
                    $rent = new Rent($req->result()[0]);
                    $dataReturn = array(
                        'dateReturn' => $dateReturn,
                        'rentsId' => $rent->getId()
                    );
                    $this->RentManager->insertReturn($dataReturn);
                    $data['disponibility'] = false;
                    $this->CarManager->updateCar($carId, $data);
                    redirect('ReturnController/registerReturnAdmin');
                }
                else {
                    $this->render('registerReturnAdmin',$dataContent);
                }
            }
            else {
                $this->render('registerReturnAdmin',$dataContent);
            }
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