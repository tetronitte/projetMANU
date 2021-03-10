<?php

class UserController extends CI_Controller {

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
                "address" => $this->input->post('address'),
                "city" => $this->input->post('city'),
                "drivingLicense" => $this->input->post('drivingLicense'),
                "drivingLicenseObtainDate" => $this->input->post('drivingLicenseObtainDate')
            );
            if($this->form_validation->run('register')) {
                $password = password_hash($dataProfil['pwd'],PASSWORD_DEFAULT);
                $dataProfil['pwd'] = $password;
                unset($dataProfil['verifPwd']);

                $this->UserManager->insertProfil($dataProfil);
                
                redirect('UserController/index');
            }
            else {
                $dataContents['profil'] = $dataProfil;
                $this->load->view('test',$dataContents);
            }
        }
        else {
            $this->render('test');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataUser = array(
                "mail" => $this->input->post('firstname'),
                "pwd" => $this->input->post('pwd'),
                "autolog" => $this->input->post('autolog')
            );
            if($this->form_validation->run('login')) {
                $req = $this->UserManager->get($dataUser['mail']);
                if ($req->num_rows() == 0) {
                    $user = new User($req->result());
                    if (password_verify($dataUser['pwd'],$user->getPwd())) {
                        //Création du token si autoload check
                        if ($dataUser['autolog'] == 'on') {
                            $token = $this->createToken();
                            $user->setToken($token);
                        }
                        //Créer la session
                        $this->session->set_userdata('id',$user->getId());
                        $this->session->set_userdata('firstname',$user->getFirstname());
                        $this->session->set_userdata('lastname',$user->getLastname());
                        //Si admin
                        if ($user->getAdmin()) {
                            
                        }
                        redirect('UserController/index');
                    }
                    else {
                        unset($dataUser['autolog']);
                        $dataContents['user'] = $dataUser;
                        $dataContents['errors'] = 'Identifiant ou mot de passe incorrect';
                        $this->render('test',$dataContents);
                    }
                }
                else {
                    unset($dataUser['autolog']);
                    $dataContents['user'] = $dataUser;
                    $dataContents['errors'] = 'Identifiant ou mot de passe incorrect';
                    $this->render('test',$dataContents);
                }
            }
            else {
                unset($dataUser['autolog']);
                $dataContents['user'] = $dataUser;
                $this->render('test',$dataContents);
            }
        }
        else {
            $this->render('test');
        }
    }

    public function signout() {
        unset(
            $_SESSION['id'],
            $_SESSION['firstname'],
            $_SESSION['lastname']
        );
        delete_cookie('autolog');
        redirect('UserController/list_appointments');
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
                $this->UserManager->update($dataProfil);
                redirect('UserController/index');
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

    public function index() {
        $this->render('test');
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

    private function render($file) {
        //$this->load->view('templates/header');
        $this->load->view($file);
    }
}