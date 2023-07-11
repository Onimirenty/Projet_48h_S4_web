<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sport extends CI_Model {

    public function insertion($nom, $prix){
        $data=array(
            'nom' => $nom,
            'prix' => $prix
        );
        $this->db->insert('sport', $data);
    }

    public function selection(){
        $r = $this->db->query('select * from sport');
        return $r->result();	
    }

    public function selectNom($id){
        $r = $this->db->query("select nom from sport where id='$id'");
        return $r->row_array()['nom'];
    }

    public function delete($id){
        $this->db->query("delete from sport where id= '$id'");
    }

    public function update($nom, $prix, $id){
        $this->db->query("update sport set nom= '$nom' ,prix = '$prix' where id = '$id'");
    }
}