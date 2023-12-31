<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLogin extends CI_Controller {
	public function index(){
	    $this->load->view('v_login');
	}	

	public function verification(){
		$email = $this->input->post('email');
        $mdp = $this->input->post('mdp');

        $log = $this->Login->selection();
        $admin = $this->Admin->selection();

        foreach($admin as $a) {
        	if($email == $a->email && $mdp == $a->mdp){
        		$this->session->set_userdata('user', $a->id);         
	            redirect(base_url('/Welcome/admin'));
        	}
        }
        foreach($log as $l) {
        	if($email == $l->email && $mdp == $l->mdp){
	            $this->session->set_userdata('userId', $l->idPersonne);        
	            redirect(base_url('/Welcome/home/' . $l->idPersonne));
	        }	        
        }
		
		redirect(base_url('/CLogin'));
	}

	public function exit(){
		$this->session->unset_userdata('userId');         
		redirect(base_url('/CLogin'));		
	}
    
}
