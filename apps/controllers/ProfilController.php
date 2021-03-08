<?php

class ProfilController extends CI_Controllers {

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataProfil = array(
                "firstname" => $this->input->post('firstname'),
                "lastname" => $this->input->post('lastname'),
                "birthdate" => $this->input->post('birthdate'),
                "phone" => $this->input->post('phone'),
                "mail" => $this->input->post('mail'),
                "pwd" => $this->input->post('pwd'),
                "verifPwd" => $this->input->post('verifPwd'),
                "adress" => $this->input->post('adress'),
                "city" => $this->input->post('city'),
                "drivingLicence" => $this->input->post('drivingLicence'),
                "drivingLicenceObtainDate" => $this->input->post('drivingLicenceObtainDate')
            );
            if($this->form_validation->run('register')) {
                $this->ProfilManager->insert($dataProfil);
                redirect('ProfilController/index');
            }
            else {
                $dataContents['profil'] = $dataProfil;
                $dataContents['errors'] = '';
                $this->render('register',$dataContents);
            }
        }
        else {
            $this->render('register');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataProfil = array(
                "mail" => $this->input->post('firstname'),
                "pwd" => $this->input->post('pwd'),
                "autolog" => $this->input->post('autolog')
            );
            if($this->form_validation->run('login')) {
                $req = $this->ProfilManager->get($dataProfil['mail']);
                $profil = new Profil($req->result());
                //Création du token si autoload check
                if ($dataProfil['autolog'] = 'on') {
                    $token = $this->createToken();
                    $profil->setToken($token);
                }
                //Créer la session
                $this->session->set_userdata('id',$profil->getId());
                $this->session->set_userdata('firstname',$profil->getFirstname());
                $this->session->set_userdata('lastname',$profil->getLastname());
                redirect('ProfilController/index');
            }
            else {
                $dataContents['profil'] = $dataProfil;
                $dataContents['errors'] = '';
                $this->render('login',$dataContents);
            }
        }
        else {
            $this->render('login');
        }
    }

    public function signout() {
        unset(
            $_SESSION['id'],
            $_SESSION['firstname'],
            $_SESSION['lastname']
        );
        delete_cookie('autolog');

    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataProfil = array(
                "firstname" => $this->input->post('firstname'),
                "lastname" => $this->input->post('lastname'),
                "birthdate" => $this->input->post('birthdate'),
                "phone" => $this->input->post('phone'),
                "mail" => $this->input->post('mail'),
                "pwd" => $this->input->post('pwd'),
                "verifPwd" => $this->input->post('verifPwd'),
                "adress" => $this->input->post('adress'),
                "city" => $this->input->post('city'),
                "drivingLicence" => $this->input->post('drivingLicence'),
                "drivingLicenceObtainDate" => $this->input->post('drivingLicenceObtainDate')
            );
            if($this->form_validation->run('register')) {
                $this->ProfilManager->update($dataProfil);
                redirect('ProfilController/index');
            }
            else {
                $dataContents['profil'] = $dataProfil;
                $dataContents['errors'] = '';
                $this->render('register',$dataContents);
            }
        }
        else {
            $this->render('register');
        }
    }

    public function profil() {
        $req = $this->db->getProfil($this->session->id);
        $profil = new Profil($req->result());
        $this->render('register',$profil);
    }

    private function createToken() {
        $options = new Options();
        $tokenSize = $options->getTokenSize();
        $tokenTime = $options->getTokenTime();
        $token = bin2hex(random_bytes($tokenSize));
        setcookie('autolog',$token,time()+$tokenTime,'/');
        $this->ProfilManager->upateToken($token);
        return $token;
    }
}