<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/***** Mise à jour des infos d'une voiture *****/
	public function updatecar(int $id)
	{
		$this->form_validation->set_rules('picture', 'Photo', 'trim|required]');
		$this->form_validation->set_rules('licenceplate', 'Plaque immatriculation', 'trim|required');
		$this->form_validation->set_rules('detail', 'Détail', 'trim|required');
		$this->form_validation->set_rules('mileage', 'Kilométrage', 'trim|required');
		$this->form_validation->set_rules('disponibility', 'Disponibilité', 'trim|required');
		if ($this->form_validation->run() == TRUE)
		{
			$data = array(				
				'picture'=> $this->input->post('picture'),
				'licenceplate'=> $this->input->post('licenceplate'),
				'detail'=> $this->input->post('detail'),
				'mileage'=> $this->input->post('mileage'),
				'disponibility'=> $this->input->post('disponibility')
			);

			$this->load->model('Car');
			$result = $this->Car->updatecar($id, $data);

			$res['mess'] = "Mise à jour de la voiture effectuée avec succès";
			$this->load->view('header');
			$this->load->view('main',$res);
			$this->load->view('footer');
		}
		else
		{
			$res['mess'] = "Echec de la mise à jour de la voiture";
			$this->load->view('header');
			$this->load->view('main',$res);
			$this->load->view('footer');
		}
	}

	/***** Suppression d'une voiture *****/
	public function deletecar(int $id)
	{
		$this->load->model('Car');
		$result = $this->Car->deletecar($id);

		if$result==true) {
			$res['mess'] = "Suppression de la voiture effectuée avec succès";
			$this->load->view('header');
			$this->load->view('main',$res);
			$this->load->view('footer');
		}
		else {
			$res['mess'] = "Echec de la suppression de la voiture";
			$this->load->view('header');
			$this->load->view('main',$res);
			$this->load->view('footer');
		}
	}

	/***** Suppression d'un client *****/
	public function deletecustomer(int $id)
	{
		$this->load->model('Customer');
		$result = $this->Customer->deletecustomer($id);

		if$result==true) {
			$res['mess'] = "Suppression du client effectuée avec succès";
			$this->load->view('header');
			$this->load->view('main',$res);
			$this->load->view('footer');
		}
		else {
			$res['mess'] = "Echec de la suppression du client";
			$this->load->view('header');
			$this->load->view('main',$res);
			$this->load->view('footer');
		}
	}

	// Mémorisation d'une location
	public function saverent()
	{
		$this->form_validation->set_rules('dateStart', 'Date de début', 'trim|required]');
		$this->form_validation->set_rules('dateEnd', 'Date de fin', 'trim|required');
		$this->form_validation->set_rules('carId', 'Voiture', 'trim|required]');
		$this->form_validation->set_rules('rentProfilId', 'Client', 'trim|required');
		if ($this->form_validation->run() == TRUE)
		{
			$data = array(				
				'dateStart'=> $this->input->post('dateStart'),
				'dateEnd'=> $this->input->post('dateEnd'),
				'CarId'=> $this->input->post('CarId'),
				'rentProfilId'=> $this->input->post('rentProfilId')
			);

			$this->load->model('Rent');
			$result = $this->Rent->saverent($id, $data);

			$res['mess'] = "Location enregistrée avec succès";
			$this->load->view('header');
			$this->load->view('main',$res);
			$this->load->view('footer');
		}
		else
		{
			$res['mess'] = "Echec de la création d'une location";
			$this->load->view('header');
			$this->load->view('main',$res);
			$this->load->view('footer');
		}
	}

	// Mémorisation d'un retour
	public function savereturn()
	{
		$this->form_validation->set_rules('dateReturn', 'Date de retour', 'trim|required]');
		$this->form_validation->set_rules('rentId', 'Client', 'trim|required');
		if ($this->form_validation->run() == TRUE)
		{
			$data = array(				
				'dateReturn'=> $this->input->post('dateReturn'),
				'rentId'=> $this->input->post('rentId'),
			);

			$this->load->model('Return');
			$result = $this->Return->savereturn($id, $data);

			$res['mess'] = "Location enregistrée avec succès";
			$this->load->view('header');
			$this->load->view('main',$res);
			$this->load->view('footer');
		}
		else
		{
			$res['mess'] = "Echec de la création d'une location";
			$this->load->view('header');
			$this->load->view('main',$res);
			$this->load->view('footer');
		}
	}

}
