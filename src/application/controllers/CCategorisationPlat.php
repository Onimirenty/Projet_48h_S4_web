<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CCategorisationPlat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // $data['ids'] = $this->PlatRegime->getAllRegimeIds();
        $data['allRegime'] = $this->DaoM->getAll('regime');
        // $data['regime_plat'] = $this->DaoM->getAll('v_regime_plat');
        // $data['ids'] = $this->PlatRegime->getAllRegimeIds();
        $data['content'] = 'front_office/platParRegime';
        $this->load->view('front_office/template', $data);
    }

    public function getPlatsParCategorie()
    {
        $id=$this->input->post('regime');
        // $data['ids'] = $this->PlatRegime->getAllRegimeIds();
        $data['allRegime'] = $this->DaoM->getAll('regime');
        $idRegime = $this->input->post('idRegime');
        $data['plats'] = $this->DaoM->selectWithCondition('v_regime_plat', "id_regime                                                = '{$idRegime}' ");
        $data['content'] = 'front_office/platParRegime';
        $this->load->view('front_office/template', $data);
    }

}
?>