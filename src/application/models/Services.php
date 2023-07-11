<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Model {

    public function selection(){
        $r = $this->db->query('select * from services');
        return $r->result();	
    }


}