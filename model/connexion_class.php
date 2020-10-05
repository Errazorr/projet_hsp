<?php

class Connexion {
// classe connexion reprenant les informations du manager, formulaire, model//


  protected $_mail;
  private $_mdp;

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

  //Déclaration de l'ensemble des setter //

  public function setMail ($mail){
    $this->_mail = $mail;
  }

  public function setMdp ($mdp){
    $this->_mdp = $mdp;
  }

  //Déclaration de l'ensemble des getters //

  public function getMail(){return $this->_mail;}
  public function getMdp(){return $this->_mdp;}
}

?>
