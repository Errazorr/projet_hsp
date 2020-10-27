<?php

class RDV {
	private $nom_patient;
	private $prenom_patient;
  private $nom_medecin;
  private $raison_consult;
	private $date_consult;
	private $time_consult;

  public function __construct($nom_patient, $prenom_patient, $nom_medecin, $raison_consult, $date_consult, $time_consult) {
  	$this->setNomPatient($nom_patient);
		$this->setPrenomPatient($prenom_patient);
    $this->setNomMedecin($nom_medecin);
    $this->setRaisonConsult($raison_consult);
		$this->setDateConsult($date_consult);
		$this->setTimeConsult($time_consult);
  }

	public function getNomPatient(){return $this->nom_patient;}
	public function getPrenomPatient(){return $this->prenom_patient;}
	public function getNomMedecin(){return $this->nom_medecin;}
	public function getRaisonConsult(){return $this->raison_consult;}
	public function getDateConsult(){return $this->date_consult;}
	public function getTimeConsult(){return $this->time_consult;}


  public function setNomPatient($nom_patient){
  	$this->nom_patient=$nom_patient;
  }
	public function setPrenomPatient($prenom_patient){
  	$this->prenom_patient=$prenom_patient;
  }
  public function setNomMedecin($nom_medecin){
  	$this->nom_medecin=$nom_medecin;
  }
  public function setRaisonConsult($raison_consult){
  	$this->raison_consult=$raison_consult;
  }
	public function setDateConsult($date_consult){
		$this->date_consult=$date_consult;
	}
	public function setTimeConsult($time_consult){
		$this->time_consult=$time_consult;
	}

}
 ?>
