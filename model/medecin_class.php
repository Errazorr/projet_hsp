<?php

class Medecin{
  //ATTRIBUTS
  private $nom;
  private $lieu;
  private $specialite;
  private $identifiant;
  private $mdp;
  private $approuve;

  public function __construct(array $donnees){
    $this->hydrate($donnees);
  }

  public function hydrate (array $donnees){
    foreach ($donnees as $key => $value) {
      $method='set'.ucfirst($key);
      if(method_exists($this, $method)){
        $this->$method($value);
      }
    }
  }

//SETTER
  public function setNom ($nom){
    $this->_nom = $nom;
  }

  public function setLieu ($lieu){
    $this->_lieu = $lieu;
  }

  public function setSpecialite ($specialite){
    $this->_specialite = $specialite;
  }

  public function setIdentifiant ($identifiant){
    $this->_identifiant = $identifiant;
  }

  public function setMdp ($mdp){
    $this->_mdp = $mdp;
  }

  public function setApprouve ($approuve){
    $this->_approuve = $approuve;
  }

//GETTER
  public function getNom(){return $this->_nom;}
  public function getLieu(){return $this->_lieu;}
  public function getSpecialite(){return $this->_specialite;}
  public function getIdentifiant(){return $this->_identifiant;}
  public function getMdp(){return $this->_mdp;}
  public function getApprouve(){return $this->_approuve;}

}


 ?>
