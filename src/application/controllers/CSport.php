<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSport extends CI_Controller {
	public function form(){
	    $data['content'] = 'back_office/formSport';
		$this->load->view('back_office/template', $data);
	}	

	public function tab(){
		$data['sport'] = $this->Sport->selection();
	    $data['content'] = 'back_office/tabSport';
		$this->load->view('back_office/template', $data);
	}	

	public function insertion(){
		$nom = $this->input->post('nom');
		$prix = $this->input->post('prix');
		$this->Sport->insertion($nom, $prix);
		redirect(base_url('/CSport/form'));
	}

	public function delete($id=""){
		$this->Sport->delete($id);
		$data['sport'] = $this->Sport->selection();
	    $data['content'] = 'back_office/tabSport';
		$this->load->view('back_office/template', $data);
	}

	public function update($id="", $nom="", $prix=""){
		$data['nom'] =  $nom;
		$data['prix'] =  $prix;
		$data['id'] =  $id;
		$data['content'] = 'back_office/modifySport';
		$this->load->view('back_office/template', $data);
	}

	public function modif($id=""){
		$nom = $this->input->post('nom');
		$prix = $this->input->post('prix');
		$this->Sport->update($nom, $prix, $id);
		$data['sport'] = $this->Sport->selection();
	    $data['content'] = 'back_office/tabSport';
		$this->load->view('back_office/template', $data);
	}
}
