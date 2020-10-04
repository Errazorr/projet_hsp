<?php

class Connexion{
  public $nom;
  public $prenom;
  public $mdp;

  public function __construct($nom, $prenom, $mdp) {
    $this->setNom();
    $this->setPrenom();
    $this->setMdp();
  }

  public function getNom(){return $this->nom;}
  public function getPrenom(){return $this->prenom;}
  public function getMdp(){return $this->mdp;}

  public function setNom($nom){
  	$this->nom=$nom;
  }
  public function setPrenom($prenom){
  	$this->prenom=$prenom;
  }
  public function setMdp($mdp){
  	$this->mdp=$mdp;
  }
}
 ?>
