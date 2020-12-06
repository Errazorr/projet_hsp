<?php

class Medecin{
  //ATTRIBUTS
  private $nom;
  private $lieu;
  private $specialite;
  private $mail;
  private $mdp;
  private $approuve;
  private $image;

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

  public function setMail ($mail){
    $this->_mail = $mail;
  }

  public function setMdp ($mdp){
    $this->_mdp = $mdp;
  }

  public function setApprouve ($approuve){
    $this->_approuve = $approuve;
  }

  public function setImage ($image){
    $this->_image = $image;
  }

//GETTER
  public function getNom(){return $this->_nom;}
  public function getLieu(){return $this->_lieu;}
  public function getSpecialite(){return $this->_specialite;}
  public function getMail(){return $this->_mail;}
  public function getMdp(){return $this->_mdp;}
  public function getApprouve(){return $this->_approuve;}
      public function getImage(){return $this->_image;}

}


 ?>
