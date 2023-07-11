<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CTransaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['regime'] = $this->Regime->selection();
        $idplat = $this->RegimePlat->selection();
        $data['idplat'] = $idplat;
        $data['plat'] = $this->Plat->selection();
        $data['content'] = 'front_office/service';
        $this->load->view('front_office/template', $data);
    }

    public function payer($idpll = "")
    {
        $data['regime'] = $this->Regime->selection();
        $idplat = $this->RegimePlat->selection();
        $data['idplat'] = $idplat;
        $data['plat'] = $this->Plat->selection();
        $data['content'] = 'front_office/service';
        $this->load->view('front_office/template', $data);
        $id = $this->input->post('regime');

        $wallet = $this->Recharge->getWalletByIdPersonne('wallet', $id);
        // $prix = $this->PlatRegime->getPlatsByIdRegime($idpll)['prix'];
        $this->DaoM->showTabContentAsError($this->PlatRegime->getPlatsByIdRegime($idpll));
        // if ($this->Transaction->ArgentClientSuffisant($id,$prix)) {
            
        //     $montant_a_ajoute = - $prix;
        //     $this->Transaction->finance_utilisateur($wallet, $montant_a_ajoute, $_SESSION['userId'], date('Y-m-d'));
        // }
        // // $data['ids'] = $this->PlatRegime->getAllRegimeIds();
        
        // $data['allRegime'] = $this->DaoM->getAll('regime');
        // $idRegime = $this->input->post('idRegime');
        // $data['plats'] = $this->DaoM->selectWithCondition('v_regime_plat', "id_regime = '{$idRegime}' ");
        // $data['content'] = 'front_office/platParRegime';
        // $this->load->view('front_office/template', $data);
    }

}
?>