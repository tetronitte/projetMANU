<?php

class ReturnController extends CI_Controller {

    public function addReturn() {
        if(isser($this->session->admin)) {
            $dataContent['title'] = 'Ajouter un retour';
            $dataContent['css'] = 'style';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->form_validation->run('signin')) {
                    $dateReturn = $this->input->post('dateReturn');
                    $user = $this->input->post('user');
                    $car = $this->input->post('car');
                    $req = $this->RentManager($user,$car);
                    $rent = new Rent($req->result()[0]);
                    $dataReturn = array(
                        'dateReturn' => $dateReturn,
                        'rentsId' => $rent->getId()
                    );
                    $this->RentManager->insertRent($dataReturn);
                    
                    redirect('ReturnController/addReturn');
                }
                else {
                    $this->render('addReturn',$dataContent);
                }
            }
            else {
                $this->render('addReturn',$dataContent);
            }
        }
        else {
            redirect('UserController/index');
        }
    }
}