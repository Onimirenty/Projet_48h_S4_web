<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CDashboard extends CI_Controller {
	
	public function dashBoardV()
	{
		$data['content'] = "dashBoardV";
		$this->load->view('templates/templateV',$data);
	}	
	
}
?>