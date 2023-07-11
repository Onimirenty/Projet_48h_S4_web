<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSuggestion extends CI_Controller {
	public function home(){
	    $regimeMincir = $this->Suggestion->selectionRegimeMincir();
	    $regimeGrossir = $this->Suggestion->selectionRegimeGrossir();
		$sportMincir = $this->Suggestion->selectionSportMincir();
		$sportGrossir = $this->Suggestion->selectionSportGrossir();
		$tabregimeMincir = array();
		$tabregimeGrossir = array();
		$tabsportMincir = array();
		$tabsportGrossir = array();

		$i=0;
		foreach ($regimeMincir as $p){
			$nom = $this->Regime->selectNom($p->idRegime);
			$tabregimeMincir[$i] = $nom;
			$i = $i+1;
		}

		$j=0;
		foreach ($regimeGrossir as $g){
			$nom = $this->Regime->selectNom($g->idRegime);
			$tabregimeGrossir[$j] = $nom;
			$j = $j+1;
		}

		$k=0;
		foreach ($sportMincir as $sm){
			$nom = $this->Sport->selectNom($sm->idSport);
			$tabsportMincir[$k] = $nom;
			$k = $k+1;
		}

		$l=0;
		foreach ($sportGrossir as $sg){
			$nom = $this->Sport->selectNom($sg->idSport);
			$tabsportGrossir[$l] = $nom;
			$l = $l+1;
		}

		$data['regimeMincir'] = $tabregimeMincir;
		$data['regimeGrossir'] = $tabregimeGrossir;
		$data['sportMincir'] = $tabsportMincir;
		$data['sportGrossir'] = $tabsportGrossir;
		$data['content'] = 'front_office/suggestion';
		$this->load->view('front_office/template', $data);
	}	

	public function suggest($id=""){
		$details = $this->Details->selection2($id);
		$idObjectif = $details['idObjectif'];
		$regime = $this->Suggestion->selectionRegime($idObjectif);
		$sport = $this->Suggestion->selectionSport($idObjectif);	
		$tabregime = array();
		$tabsport = array();
		$tabidregime = array();
		$tabidsport = array();
		$i=0;
		foreach ($regime as $r){
			$nom = $this->Regime->selectNom($r->idRegime);
			$tabregime[$i] = $nom;
			$idr=$r->idRegime;
			$tabidregime[$i] = $idr;
			$i = $i+1;
		}
		$j=0;
		foreach ($sport as $s){
			$nom = $this->Sport->selectNom($s->idSport);
			$tabsport[$j] = $nom;
			$ids=$j+1;
			$tabidsport[$j] = $ids;
			$j = $j+1;
		}

		$data['idregime'] = $tabidregime;
		$data['regime'] = $tabregime;
		$data['sport'] = $tabsport;
		$data['id'] = $id;
		$data['content'] = 'front_office/suggestionPersonne';
		$this->load->view('front_office/template', $data);
	}

	public function details($id="", $idregime=""){
		$details = $this->Details->selection2($id);
		$idObjectif = $details['idObjectif'];
		$regime = $this->Suggestion->selectionRegime($idObjectif);
		$sport = $this->Suggestion->selectionSport($idObjectif);	
		$tabregime = array();
		$tabsport = array();
		$tabidregime = array();
		$i=0;
		foreach ($regime as $r){
			$nom = $this->Regime->selectNom($r->idRegime);
			$tabregime[$i] = $nom;
			$idr=$r->idRegime;
			$tabidregime[$i] = $idr;
			$i = $i+1;
		}
		$j=0;
		foreach ($sport as $s){
			$nom = $this->Sport->selectNom($s->idSport);
			$tabsport[$j] = $nom;
			$j = $j+1;
		}

		$idplat = array();
		$regimeplat = $this->RegimePlat->selection2($idregime);
		$k=0;
		foreach($regimeplat as $rp){
			$idplat[$k] = $rp->idPlat;
			$k = $k+1;
		}

		$platnom = array();
		$platprix = array();
		$l=0;
		for($i=0; $i<sizeof($idplat); $i++){
			$nom = $this->Plat->selectionNom($idplat[$i]);
			$platnom[$l] = $nom;
			$prix = $this->Plat->selectionPrix($idplat[$i]);
			$platprix[$l] = $prix;
			$l = $l+1;
		}

		$data['idregime'] = $tabidregime;
		$data['regime'] = $tabregime;
		$data['sport'] = $tabsport;
		$data['id'] = $id;
		$data['detailsRegime'] = $this->Regime->selection2($idregime);
		$data['platnom'] = $platnom;
		$data['platprix'] = $platprix;
		$data['content'] = 'front_office/detailsSuggestion';
		$this->load->view('front_office/template', $data);	
	}
}
