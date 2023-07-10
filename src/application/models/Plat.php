<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plat extends CI_Model {

    public function insertion($nom, $prix){
        $data=array(
            'nom' => $nom,
            'prix' => $prix
        );
        $this->db->insert('plat', $data);
    }

    public function selection(){
        $r = $this->db->query('select * from plat');
        return $r->result();	
    }

    public function delete($id){
        $this->db->query("delete from plat where id= '$id'");
    }

    public function update($nom, $prix, $id){
        $this->db->query("update plat set nom= '$nom' ,prix= '$prix' where id = '$id'");
    }
}