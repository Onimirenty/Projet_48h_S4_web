<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DefaultC extends CI_Controller {

	public function DMCControler()
	{
		$data['content'] = "chemin avec views comme racine";
		$this->load->view('templates/templateV',$data);
	}	
	
}
