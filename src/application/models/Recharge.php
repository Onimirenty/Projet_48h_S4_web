<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recharge extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    public function getWalletByIdPersonne($tableName, $id){
        return $this->DaoM->selectWithCondition($tableName, " idPersonne= '{$id}' ");
    }

    public function insertIntoWalletHistorique($idPersonne, $idWallet, $ancienSolde, $nouveauSolde){
        $data = array(
            'idPersonne' => $idPersonne,
            'idWallet' =>$idWallet,
            'ancienSolde' => $ancienSolde,
            'nouveauSolde' => $nouveauSolde
        );
        return $data;
    }

    public function debiter_utilisateur($code_recharge, $wallet, $idPersonne, $nouveauSolde){
        $tableau_des_valeurs_a_inserer = $this->Recharge->wallet_to_historique($wallet, $idPersonne,$nouveauSolde,date('Y-m-d H:i:s'));
        $this->db->trans_start();
        $this->DaoM->updateRows('recharge', 'is_valid', 0, "code = {$code_recharge}");
        $this->DaoM->insert('wallet_historique', $tableau_des_valeurs_a_inserer);
        $this->DaoM->updateRows('wallet', "solde", $nouveauSolde, "idPersonne = {$idPersonne}");
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){
            show_error("transaction de recharge invalide");
        }
    }

    function wallet_to_historique($wallet, $idPersonne, $nouveauSolde, $dateModification){
        $wallet_historique = array(
            'idPersonne' => $idPersonne,
            'idWallet' =>$wallet['id'],
            'ancienSolde' => $wallet['solde'],
            'nouveauSolde' => $nouveauSolde,
            'dateModification' => $dateModification  
        );
        return $wallet_historique;
    }

    public function does_recharge_exist($code){
        $recharge = $this->DaoM->selectWithCondition('recharge', " code = '{$code}' ");
        if(empty($recharge) or empty($recharge[0])){
            return false;
        }
        return true;
    }
    public function is_recharge_valide($code){
        $recharge = $this->DaoM->selectWithCondition('recharge', " code = '{$code}' ");
        if(empty($recharge) or empty($recharge[0])){
            return false;
        }
        if($recharge[0]['is_valid'] == 0)
        {
            return false;
        }
        return true;
    }
    public function getRechargeByCode($code){
        $recharge = $this->DaoM->selectWithCondition('recharge', " code = '{$code}' ");
        if(empty($recharge) or empty($recharge[0])){
            return null;
        }
        return $recharge[0];
    }
}
?>