<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PlatRegime extends CI_Model
{
    public function getPlatsByIdRegime($idRegime)
    {
        $this->db->select('prix');
        $this->db->from('plat');
        $this->db->where('id', $idRegime);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllRegimeIds()
    {
        $this->db->select('id');
        $this->db->from('regime');
        $query = $this->db->get();
        $result = $query->result_array();
        $regimeIds = array_column($result, 'id');
        return $regimeIds;
    }


}