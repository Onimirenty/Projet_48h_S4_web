<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regime extends CI_Model {

    public function insertion($nom){
        $data=array(
            'nom' => $nom
        );
        $this->db->insert('regime', $data);
    }

    public function selection(){
        $r = $this->db->query('select * from regime');
        return $r->result();	
    }

    public function selectNom($id){
        $r = $this->db->query("select nom from regime where id='$id'");
        return $r->row_array()['nom'];
    }

    public function delete($id){
        $this->db->query("delete from regime where id= '$id'");
    }

    public function update($nom, $id){
        $this->db->query("update regime set nom= '$nom' where id = '$id'");
    }
}