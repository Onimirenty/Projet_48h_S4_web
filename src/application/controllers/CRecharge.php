<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRecharge extends CI_Controller {
	public function recharger(){
		$data['id'] = $_SESSION["userId"];
		$data['Defaillant'] = $this->input->get('var');
		$data['content'] = 'front_office/recharge';
		$this->load->view('front_office/template', $data);
	}

	public function debiter_utilisateur(){
		$id = $_SESSION["userId"];
		$data['imc']=$_SESSION['imc'];
		$data['details'] = $_SESSION['details'];
		$personne =$_SESSION['personne'];
		if($personne['sexe']==0){
			$sexe = "Homme";
		}else{
			$sexe = "Femme";
		}
		$data['sexe']=$sexe;
		$code = $this->input->post('code_recharge');
		$exist = $this->Recharge->does_recharge_exist($code);
		$isValid =$this->Recharge->is_recharge_valide($code);
		$wallet = $this->Recharge->getWalletByIdPersonne('wallet', $id)[0];
		$data['id'] = $id;
		if($exist AND $isValid){
			$recharge = $this->Recharge->getRechargeByCode($code);
			$this->Recharge->debiter_utilisateur($code, $wallet, $id, ($wallet['solde']+$recharge['montant']));
		}else{
			$def = "Le code de recharge n'existe pas";
			$data['content'] = 'front_office/recharge';
			// $this->load->view('front_office/template', $data);
			redirect(base_url('/CRecharge/recharger?var=' . $def));		
		}
		$data['personne'] = $_SESSION['personne'];
		$data['content'] = 'front_office/home';
		$this->load->view('front_office/template', $data);
	}
}
?>
