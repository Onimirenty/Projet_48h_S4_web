<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRecharge extends CI_Controller {
	
	public function recharger($id="")
	{   $data['id'] = $id;
		$data['content'] = "front_office/recharge";
		$this->load->view('front_office/template',$data);
	}	
	public function debiter_utilisateur()
    {
        // $this->DaoM->insert('huhu',array());
        $id=$_SESSION["userId"];
        $this->load->model('Recharge');
        $code=$this->input->post('code_recharge');
        $exist = $this->Recharge->does_recharge_exist($code);
        $wallet = $this->Recharge->getWalletByIdPersonne('wallet',$id)[0];
        $data['id'] = $id;
        if($exist)
        {
            $recharge =$this->Recharge->getRechargeByCode($code);
            $this->Recharge->debiter_utilisateur($code,$wallet,$id,( $wallet['solde'] + $recharge['montant'] ) );
        }
        else
        {
            // $this->DaoM->insert('ihi',array());
            $data['Defaillant'] = "le code de recharge n'existe pas" ;
            $data['content'] = "front_office/recharge"; 
            $this->load->view('front_office/template',$data);
        }
        $data['personne'] = $_SESSION['Personne'];
        $data['content'] = "front_office/home";
        $this->load->view('front_office/template',$data);
    }
}