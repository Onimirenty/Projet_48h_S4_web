<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$this->load->view('v_login');
	}

	public function home(){
		$id = $_SESSION["userId"];
		$personne = $this->Personne->selection2($id);
		$_SESSION['personne'] = $this->Personne->selection2($id);
		$data['personne'] = $this->Personne->selection2($id);
		if($personne['sexe']==0){
			$sexe = "Homme";
		}else{
			$sexe = "Femme";
		}
		$details = $this->Details->selection2($id);
		$taille = $details['taille']/100;
		$_SESSION['imc']=$details['poids'] / ($taille*$taille);
		$data['imc'] = $details['poids'] / ($taille*$taille);
		$_SESSION['sexe']=$data['sexe'] = $sexe;
		$data['id'] = $id;
		$data['details'] = $this->Details->selection2($id);
		$_SESSION['details'] = $this->Details->selection2($id);
		$data['wallet'] = $this->Recharge->getWalletByIdPersonne('wallet', $id)[0]; 
		$data['content'] = 'front_office/home';
		$this->load->view('front_office/template', $data);
	}	

	public function admin(){
		$data['content'] = 'back_office/home';
		$this->load->view('back_office/template', $data);
	}
}
