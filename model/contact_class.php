<?php

class Contact{
  //ATTRIBUTS
  private $nom;
  private $mail;
  private $message;
  private $sujet;

  //CONSTRUCT
  public function __construct(array $donnees){
    $this->hydrate($donnees);
  }

  //HYDRATE
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

  public function setMail ($mail){
    $this->_mail = $mail;
  }

  public function setMessage ($message){
    $this->_message = $message;
  }

  public function setSujet ($sujet){
    $this->_sujet = $sujet;
  }


//GETTER
  public function getNom(){return $this->_nom;}
  public function getMail(){return $this->_mail;}
  public function getMessage(){return $this->_message;}
  public function getSujet(){return $this->_sujet;}

}


 ?>
