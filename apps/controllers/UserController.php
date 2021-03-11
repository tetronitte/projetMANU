<?php

class UserController extends CI_Controller {

    public function signin() {
        $dataContent['title'] = 'Inscription';
        $dataContent['css'] = 'signin';
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
                "postal" => $this->input->post('postal'),
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
        $dataContent['css'] = 'login';
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
        $dataContent['title'] = 'Profil';
        $dataContent['css'] = 'userProfil';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataUser = array(
                "firstname" => $this->session->firstname,
                "lastname" => $this->session->lastname,
                "birthdate" => $this->input->post('birthdate'),
                "phone" => $this->input->post('phone'),
                "mail" => $this->input->post('mail'),
                "address" => $this->input->post('address'),
                "city" => $this->input->post('city'),
                "postal" => $this->input->post('postal'),
                "drivingLicense" => $this->input->post('drivingLicense'),
                "drivingLicenseObtainDate" => $this->input->post('drivingLicenseObtainDate')
            );
            if($this->form_validation->run('update')) {
                $this->UserManager->updateUser($dataUser,(int)$this->session->id);
                redirect('UserController/profil');
            }
            else {
                $dataContent['user'] = $dataUser;
                $this->render('userProfil',$dataContent);
            }
        }
        else {
            redirect('UserController/profil');
        }
    }

    public function profil() {
        $dataContent['title'] = 'Profil';
        $dataContent['css'] = 'userProfil';
        $req = $this->UserManager->getUserById((int)$this->session->id);
        $user = new User($req->result()[0]);
        $dataContent['user'] = $user;
        $this->render('userProfil',$dataContent);
    }

    public function updatePassword() {
        $dataContent['title'] = 'Modification mot de passe';
        $dataContent['css'] = 'updatePassword';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataUser = array(
                "oldPwd" => $this->input->post('oldPwd'),
                "pwd" => $this->input->post('pwd'),
                "verifPwd" => $this->input->post('verifPwd')
            );
            if ($this->form_validation->run('updatePassword')) {
                $req = $this->UserManager->getUserById((int)$this->session->id);
                $user = new User($req->result()[0]);
                if (password_verify($dataUser['oldPwd'],$user->getPwd())) {
                    $password = password_hash($dataUser['pwd'],PASSWORD_DEFAULT);
                    $this->UserManager->updatePassword((int)$this->session->id, $password);
                    redirect('UserController/profil');
                }
                else {
                    $dataContent['error'] = 'Mot de passe incorrect';
                    $this->render('updatePassword',$dataContent);
                }
            }
            else {
                $this->render('updatePassword',$dataContent);
            }
        }
        else {
            $this->render('updatePassword',$dataContent);
        }
    }

    public function listCar() {
        $dataContent['title'] = 'Notre catalogue';
        $dataContent['css'] = 'listVehicles';
        $req = $this->CarManager->getAllCars();
        foreach ($req->result() as $row) {
            $req2 = $this->ModelManager->getModel($row->id);
            $row->model = new Model($req2->result()[0]);
            $cars[] = new Car($row);
        }
        $dataContent['cars'] = $cars;
        $this->render('listVehicles',$dataContent);
    }

    public function index() {
        $dataContent['title'] = 'index';
        $dataContent['css'] = 'style';
        $cookie = get_cookie('autolog');
        if (!empty($cookie)) {
            $req = $this->UserManager->getToken();
            foreach($req->result() as $token) {
                if ($token == $cookie) {
                    $this->session->set_userdata('id',$user->getId());
                    $this->session->set_userdata('firstname',$user->getFirstname());
                    $this->session->set_userdata('lastname',$user->getLastname());
                    //Si admin
                    if ($user->getAdmin()) {
                        $this->session->set_userdata('admin',1);
                    }
                    break;
                }
            }
        }    
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

    private function render($file, $data) {
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar',$data);
        $this->load->view($file,$data);
        $this->load->view('templates/footer',$data);
    }
}