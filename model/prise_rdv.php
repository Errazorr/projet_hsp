<?php

class RDV {
	private $nom;
  private $mutuelle;
  private $num_sec_soc;

  public function __construct($nom, $prenom, $date_naissance, $mail, $adresse, $mutuelle, $num_sec_soc, $option_chambre, $regime, $mdp, $role) {
  	$this->setNom($nom);
    $this->setMutuelle($mutuelle);
    $this->setNumSecSoc($num_sec_soc);
  }

  public function getNom(){return $this->nom;}
  public function getMutuelle(){return $this->mutuelle;}
  public function getNumSecSoc(){return $this->num_sec_soc;}


  public function setNom($nom){
  	$this->nom=$nom;
  }
  public function setMutuelle($mutuelle){
  	$this->mutuelle=$mutuelle;
  }
  public function setNumSecSoc($num_sec_soc){
  	$this->num_sec_soc=$num_sec_soc;
  }

}
 ?>
