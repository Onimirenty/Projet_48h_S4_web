<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CPersonne extends CI_Controller {
	public function index(){
	    $this->load->view('v_inscription');
	}	

	public function insertion(){
		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$dtn= $this->input->post('dtn');
		$sexe= $this->input->post('sexe');

		$email= $this->input->post('email');
		$mdp= $this->input->post('mdp');

		$this->Personne->insertion($nom, $prenom, $dtn, $sexe);
		
		$idPers = $this->Personne->dernier();
		$this->Login->insertion($idPers, $email, $mdp);
		
		$this->load->view('v_detail');		
	}

	public function insertionDetails(){
		$idPers = $this->Personne->dernier();
		$taille = $this->input->post('taille');
		$poids = $this->input->post('poids');
		$objectif = $this->input->post('objectif');

		$this->Details->insertion($idPers, $taille, $poids);
		$this->Objectifs->insertion($objectif);
		
		redirect('CLogin');
	}

	public function userList() {
		$data['userList'] = $this->Personne->selection();

		$data['content'] = 'back_office/listUser';
		$this->load->view('back_office/template', $data);
	}

}
