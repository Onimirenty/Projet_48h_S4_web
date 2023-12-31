<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Model {

    public function insertion($idPersonne, $idObjectif, $taille, $poids){
        $data=array(
            'idPersonne' => $idPersonne,
            'idObjectif' => $idObjectif,
            'taille' => $taille,
            'poids' => $poids
        ); 
        $this->db->insert('details', $data);
    }

//-------------------------------------------------------------------------
    public function selection(){
        $r = $this->db->query('select * from details');
        return $r->result();	
    }

    public function selection2($id){
        $r = $this->db->query("select * from details where idPersonne = '$id'");
        return $r->row_array();    
    }

//-------------------------------------------------------------------------

    public function update($idPersonne, $taille, $poids, $id){
        $this->db->query("update details set idPersonne = '$idPersonne' ,taille = '$taille' ,poids= '$poids' where id = '$id'");
    }

//-------------------------------------------------------------------------

    public function delete($id){
        $this->db->query("delete from details where id = '$id'");
    }
}