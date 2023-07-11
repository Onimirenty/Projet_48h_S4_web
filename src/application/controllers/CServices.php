<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CServices extends CI_Controller {
	public function home(){
		$data['regime'] = $this->Regime->selection();
		$idplat = $this->RegimePlat->selection();
		$data['idplat'] = $idplat;
		$data['plat'] = $this->Plat->selection();
		$data['content'] = 'front_office/service';
		$this->load->view('front_office/template', $data);	
	}
}
