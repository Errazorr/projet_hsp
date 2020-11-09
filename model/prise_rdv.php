<?php

class RDV {
  //ATTRIBUTS
  private $nom_medecin;
  private $raison_consult;
	private $date_consult;
	private $time_consult;

  public function __construct($nom_medecin, $date_consult, $time_consult, $raison_consult) {
    $this->setNomMedecin($nom_medecin);
		$this->setDateConsult($date_consult);
		$this->setTimeConsult($time_consult);
    $this->setRaisonConsult($raison_consult);
  }

//GETTER
	public function getNomMedecin(){return $this->nom_medecin;}
	public function getDateConsult(){return $this->date_consult;}
	public function getTimeConsult(){return $this->time_consult;}
	public function getRaisonConsult(){return $this->raison_consult;}

//SETTER
  public function setNomMedecin($nom_medecin){
  	$this->nom_medecin=$nom_medecin;
  }
	public function setDateConsult($date_consult){
		$this->date_consult=$date_consult;
	}
	public function setTimeConsult($time_consult){
		$this->time_consult=$time_consult;
	}
  public function setRaisonConsult($raison_consult){
  	$this->raison_consult=$raison_consult;
  }

}
 ?>
