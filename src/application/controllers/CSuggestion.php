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

}
