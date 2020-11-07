<?php

class Admin{
  private $nom;
  private $prenom;
  private $mail;
  private $mdp;
  private $role;

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

  public function setNom ($nom){
    $this->_nom = $nom;
  }

  public function setPrenom ($prenom){
    $this->_prenom = $prenom;
  }

  public function setMail ($mail){
    $this->_mail = $mail;
  }

  public function setMdp ($mdp){
    $this->_mdp = $mdp;
  }

  public function setRole ($role){
    $this->_role = $role;
  }


  public function getNom(){return $this->_nom;}
  public function getPrenom(){return $this->_prenom;}
  public function getMail(){return $this->_mail;}
  public function getMdp(){return $this->_mdp;}
  public function getRole(){return $this->_role;}

}


 ?>
