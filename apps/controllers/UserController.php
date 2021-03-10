<?php

class UserController extends CI_Controller {

    public function signin() {
        $dataContent['title'] = 'Inscription';
        $dataContent['css'] = 'style';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataUser = array(
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
                $password = password_hash($dataUser['pwd'],PASSWORD_DEFAULT);
                $dataUser['pwd'] = $password;
                unset($dataUser['verifPwd']);

                $this->UserManager->insertUser($dataUser);
                
                redirect('UserController/index');
            }
            else {
                $dataContent['user'] = $dataUser;
                $this->render('signin',$dataContent);
            }
        }
        else {
            $this->render('signin',$dataContent);
        }
    }

    public function login() {
        $dataContent['title'] = 'Connexion';
        $dataContent['css'] = 'style';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataUser = array(
                "mail" => $this->input->post('mail'),
                "pwd" => $this->input->post('pwd'),
                "autolog" => $this->input->post('autolog')
            );
            if($this->form_validation->run('login')) {
                $req = $this->UserManager->getUserByMail($dataUser['mail']);
                if ($req->num_rows() == 1) {
                    $user = new User($req->result()[0]);
                    if (password_verify($dataUser['pwd'],$user->getPwd())) {
                        //Création du token si autoload check
                        if ($dataUser['autolog'] == 'accept') {
                            $token = $this->createToken($user->getId());
                            $user->setToken($token);
                        }
                        //Créer la session
                        $this->session->set_userdata('id',$user->getId());
                        $this->session->set_userdata('firstname',$user->getFirstname());
                        $this->session->set_userdata('lastname',$user->getLastname());
                        //Si admin
                        if ($user->getAdmin()) {
                            $this->session->set_userdata('admin',1);
                        }
                        redirect('UserController/index');
                    }
                    else {
                        unset($dataUser['autolog']);
                        $dataContent['user'] = $dataUser;
                        $dataContent['errors'] = 'Identifiant ou mot de passe incorrect';
                        $this->render('login',$dataContent);
                    }
                }
                else {
                    unset($dataUser['autolog']);
                    $dataContent['user'] = $dataUser;
                    $dataContent['errors'] = 'Identifiant ou mot de passe incorrect';
                    $this->render('login',$dataContent);
                }
            }
            else {
                unset($dataUser['autolog']);
                $dataContent['user'] = $dataUser;
                $this->render('login',$dataContent);
            }
        }
        else {
            $this->render('login',$dataContent);
        }
    }

    public function signout() {
        unset(
            $_SESSION['id'],
            $_SESSION['firstname'],
            $_SESSION['lastname']
        );
        delete_cookie('autolog');
        redirect('UserController/index');
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
        $dataContent['title'] = 'index';
        $dataContent['css'] = 'style';
        $this->render('index',$dataContent);
    }

    private function createToken(int $id) {
        // $options = new Options();
        // $tokenSize = $options->getTokenSize();
        // $tokenTime = $options->getTokenTime();
        $tokenSize = 64;
        $tokenTime = 3600;
        $token = bin2hex(random_bytes($tokenSize));
        setcookie('autolog',$token,time()+$tokenTime,'/');
        $this->UserManager->updateToken($id,$token);
        return $token;
    }

    private function render($file,$data) {
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$data);
        $this->load->view($file,$data);
        $this->load->view('templates/footer',$data);
    }
}