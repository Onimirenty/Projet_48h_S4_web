<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getWalletByIdPersonne($tableName, $id)
    {
        return $this->DaoM->selectWithCondition($tableName, " idPersonne= '{$id}' ");
    }

    public function finance_utilisateur($wallet, $montant_a_ajoute, $idPersonne, $dateModification)
    {
        $wallet_historique = array(
            'idPersonne' => $idPersonne,
            'idWallet' => $wallet['id'],
            'ancienSolde' => $wallet['solde'],
            'nouveauSolde' => $montant_a_ajoute + $wallet['solde'],
            'dateModification' => date('Y-m-d H:i:s')
        );
        $this->db->trans_start();
        $this->DaoM->insert('wallet_historique', $wallet_historique);
        $this->DaoM->updateRows('wallet', "solde", $wallet_historique['nouveauSolde'], "idPersonne = {$idPersonne}");
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            show_error("transaction de recharge invalide");
        }
    }
    public function finance_banque($idBanque, $nouveauSolde, $ancienSolde, $dateModification)
    {
        $historique_banque = array(
            'idBanque' => $idBanque,
            'nouveauSolde' => $nouveauSolde,
            'ancienSolde' => $ancienSolde,
            'dateModification' => $dateModification
        );
        $this->db->trans_start();
        $this->DaoM->insert('historique_banque', $historique_banque);
        $this->DaoM->updateRows('banque', "solde", $nouveauSolde, "id = {$idBanque}");
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            show_error("Transaction de modification de solde bancaire invalide");
        }
    }

    public function addTransactionHistory($idWallet, $idService, $dateModification)
    {
        $transactionData = array(
            'idWallet' => $idWallet,
            'idService' => $idService,
            'dateModification' => $dateModification
        );

        $this->db->trans_start();
        $this->DaoM->insert('historique_transaction', $transactionData);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            show_error("Erreur lors de l'ajout de l'historique de transaction");
        }
    }

    function wallet_to_historique($wallet, $montant_a_ajoute, $idPersonne, $nouveauSolde, $dateModification)
    {
        $wallet_historique = array(
            'idPersonne' => $idPersonne,
            'idWallet' => $wallet['id'],
            'ancienSolde' => $wallet['solde'],
            'nouveauSolde' => $nouveauSolde,
            'dateModification' => $dateModification
        );
        return $wallet_historique;
    }
    // Fonction pour récupérer les services actifs
    public function getActiveServices()
    {
        $currentDate = date('Y-m-d');
        $this->db->where('dateDebut <=', $currentDate);
        $query = $this->db->get('services');
        return $query->result();
    }

    // Fonction pour calculer le coût du régime/plat
    public function getRegimePlatCost($idRegimePlat, $idPlat)
    {
        $this->db->select_sum('prix');
        $this->db->where('idRegime', $idRegimePlat);
        $this->db->where('idPlat', $idPlat);
        $query = $this->db->get('v_regime_plat');
        $result = $query->row();
        return ($result->prix != null) ? $result->prix : 0;
    }

    // Fonction pour calculer le coût du sport
    public function getSportCost($idSport)
    {
        $this->db->select('prix');
        $this->db->where('id', $idSport);
        $query = $this->db->get('sport');
        $result = $query->row();
        return ($result != null) ? $result->prix : 0;
    }
    public function getPrixServiceIndividuel($idRegimePlat, $idPlat, $idSport)
    {
        return $this->getRegimePlatCost($idRegimePlat, $idPlat) + $this->getSportCost($idSport);
    }
    public function calculateServicePrice($idRegimePlat, $idPlat, $idSport)
    {
        $this->db->select('duree');
        $this->db->where('idRegimePlat', $idRegimePlat);
        $this->db->where('idSport', $idSport);
        $query = $this->db->get('services');
        $result = $query->row();
        $duree = $result->duree;
        $dureeEnJours = $duree;
        $prixServiceIndividuel = $this->getPrixServiceIndividuel($idRegimePlat, $idPlat, $idSport);
        $prixTotalService = $prixServiceIndividuel * $dureeEnJours;
        return $prixTotalService;
    }

    // Fonction pour calculer le coût d'un service individuel
    public function calculateServiceCost($service)
    {
        $serviceCost = 0;
        $regimePlatCost = $this->getRegimePlatCost($service->idRegimePlat); // Calcule le coût du régime/plat
        $sportCost = $this->getSportCost($service->idSport); // Calcule le coût du sport

        // Calcul du coût total du service en fonction de la durée
        $serviceCost = ($regimePlatCost + $sportCost) * $service->duree;

        return $serviceCost;
    }
    public function calculateTotalCost()
    {
        $services = $this->getActiveServices(); // Récupère les services actifs
        $totalCost = 0;

        foreach ($services as $service) {
            $serviceCost = $this->calculateServiceCost($service); // Calcule le coût du service
            $totalCost += $serviceCost;
        }

        return $totalCost;
    }
    public function ArgentClientSuffisant($idPersonne, $prix)
    {
        $walletClient = $this->DaoM->getWithCondition('v_wallet', "idPersonne='{$idPersonne}'")[0];
        if (!empty($wallet) and $walletClient['solde'] >= $prix) {
            return $walletClient['solde'];
        }
        return 0;
    }
    public function getSoldeBanqueById($idBanque)
    {
        $this->db->select('solde');
        $this->db->where('id', $idBanque);
        $query = $this->db->get('banque');
        $result = $query->row();
        return ($result != null) ? $result->solde : 0;
    }

}
?>