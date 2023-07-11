<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suggestion extends CI_Model {

//-------------------------------------------------------------------------
    public function selectionRegimeMincir(){
        $r = $this->db->query('select * from suggestion_regime where idObjectif=2');
        return $r->result();	
    }

    public function selectionRegimeGrossir(){
        $r = $this->db->query('select * from suggestion_regime where idObjectif=1');
        return $r->result();    
    }

    public function selectionSportMincir(){
        $r = $this->db->query('select * from suggestion_sport where idObjectif=2');
        return $r->result();    
    }

    public function selectionSportGrossir(){
        $r = $this->db->query('select * from suggestion_sport where idObjectif=1');
        return $r->result();    
    }
//-------------------------------------------------------------------------

}