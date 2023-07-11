<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CPlat extends CI_Controller {
	public function form(){
	    $data['content'] = 'back_office/formPlat';
		$this->load->view('back_office/template', $data);
	}

	public function tab(){
		$data['plat'] = $this->Plat->selection();
	    $data['content'] = 'back_office/tabPlat';
		$this->load->view('back_office/template', $data);
	}	

	public function insertion(){
		$nom = $this->input->post('nom');
		$prix = $this->input->post('prix');
		$this->Plat->insertion($nom, $prix);
		redirect(base_url('/CPlat/form'));
	}

	public function delete($id=""){
		$this->Plat->delete($id);
		$data['plat'] = $this->Plat->selection();
	    $data['content'] = 'back_office/tabPlat';
		$this->load->view('back_office/template', $data);
	}

	public function update($id="", $nom="", $prix=""){
		$data['nom'] =  $nom;
		$data['prix'] =  $prix;
		$data['id'] =  $id;
		$data['content'] = 'back_office/modifyPlat';
		$this->load->view('back_office/template', $data);
	}

	public function modif($id=""){
		$nom = $this->input->post('nom');
		$prix = $this->input->post('prix');
		$this->Plat->update($nom, $prix, $id);
		$data['plat'] = $this->Plat->selection();
	    $data['content'] = 'back_office/tabPlat';
		$this->load->view('back_office/template', $data);
	}

	
}
