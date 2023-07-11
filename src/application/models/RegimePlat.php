<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegimePlat extends CI_Model {

    public function selection(){
        $r = $this->db->query('select * from regime_plat');
        return $r->result();	
    }

    public function selection2($id){
        $r = $this->db->query("select * from regime_plat where idRegime = '$id'");
        return $r->result();    
    }


}