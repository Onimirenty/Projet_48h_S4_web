<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {

    public function insertion($email, $mdp){
        $data=array(
            'email' => $email,
            'mdp' => $mdp,

        );
        $this->db->insert('admin', $data);
    }

    public function selection(){
        $r = $this->db->query('select * from admin');
        return $r->result();	
    }

    public function delete($id){
        $this->db->query("delete from admin where id= '$id'");
    }
}