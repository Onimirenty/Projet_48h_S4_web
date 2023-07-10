<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {
    
    public function insertion($idPersonne, $email, $mdp){
        $data=array(
            'idPersonne' => $idPersonne,
            'email' => $email,
            'mdp' => $mdp,
        
        );
        $this->db->insert('login', $data);
    }
    
    public function selection(){
        $r = $this->db->query(' select * from login ');
        return $r->result();	
    }
    
    public function update($idPersonne, $email, $mdp, $id){
        $this->db->query("update login set idPersonne= '$idPersonne' ,email= '$email' ,mdp= '$mdp' where id = '$id'");
    }
    
    public function delete($id){
        $this->db->query("delete from login where id = '$id'");
    }
}