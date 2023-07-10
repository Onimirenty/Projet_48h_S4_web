<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objectifs extends CI_Model {

    public function insertion($objectif){
        $data=array(
            'objectif' => $objectif
        ); 
        $this->db->insert('objectifs', $data);
    }

//-------------------------------------------------------------------------
    public function selection(){
        $r = $this->db->query('select * from objectifs');
        return $r->result();	
    }


}