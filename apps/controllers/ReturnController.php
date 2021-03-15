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
            $dataContent['css'] = 'registerReturnAdmin';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $dataReturn = array(
                    'dateReturn' => $this->input->post('dateReturn'),
                    'numRent' => $this->input->post('numRent')
                );
                if($this->form_validation->run('addReturn')) {
                    $req = $this->RentManager->getRentByNum($dataReturn['numRent']);
                    $dataReturn['rentsId'] = $req->result()[0]->id;
                    unset($dataReturn['numRent']);
                    $this->ReturnManager->insertReturn($dataReturn);
                    redirect('ReturnController/addReturn');
                }
                else {
                    $dataContent['return'] = $dataReturn;
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