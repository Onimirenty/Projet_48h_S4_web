<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRegime extends CI_Controller {
	public function form(){
	    $data['content'] = 'back_office/formRegime';
		$this->load->view('back_office/template', $data);
	}
	
	public function tab(){
		$data['regime'] = $this->Regime->selection();
	    $data['content'] = 'back_office/tabRegime';
		$this->load->view('back_office/template', $data);
	}	

	public function insertion(){
		$nom = $this->input->post('nom');
		$viande = $this->input->post('viande');
		$poisson = $this->input->post('poisson');
		$volaille = $this->input->post('volaille');
		$this->Regime->insertion($nom, $viande, $poisson, $volaille);
		redirect(base_url('/CRegime/form'));
	}

	public function delete($id=""){
		$this->Regime->delete($id);
		$data['regime'] = $this->Regime->selection();
	    $data['content'] = 'back_office/tabRegime';
		$this->load->view('back_office/template', $data);
	}

	public function update($id="", $nom=""){
		$data['nom'] =  $nom;
		$data['id'] =  $id;
		$data['content'] = 'back_office/modifyRegime';
		$this->load->view('back_office/template', $data);
	}

	public function modif($id=""){
		$nom = $this->input->post('nom');
		$prix = $this->input->post('prix');
		$this->Regime->update($nom, $id);
		$data['regime'] = $this->Regime->selection();
	    $data['content'] = 'back_office/tabRegime';
		$this->load->view('back_office/template', $data);
	}
}
