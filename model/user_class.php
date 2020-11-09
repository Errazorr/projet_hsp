<?php

class User {
// classe user reprenant les informations du manager, formulaire, model//
//ATTRIBUTS
private $nom;
private $prenom;
private $date_naissance;
private $mail;
private $adresse;
private $mutuelle;
private $num_sec_soc;
private $option_chambre;
private $regime;
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

  //Déclaration de l'ensemble des setter //

  public function setNom ($nom){
    $this->_nom = $nom;
  }

  public function setPrenom ($prenom){
    $this->_prenom = $prenom;
  }

  public function setDateNaissance ($date_naissance){
    $this->_date_naissance = $date_naissance;
  }

  public function setMail ($mail){
    $this->_mail = $mail;
  }

  public function setAdresse ($adresse){
    $this->_adresse = $adresse;
  }

  public function setMutuelle ($mutuelle){
    $this->_mutuelle = $mutuelle;
  }

  public function setNumSecSoc ($num_sec_soc){
    $this->_num_sec_soc = $num_sec_soc;
  }

  public function setOptionChambre ($option_chambre){
    $this->_option_chambre = $option_chambre;
  }

  public function setRegime ($regime){
    $this->_regime = $regime;
  }

  public function setMdp ($mdp){
    $this->_mdp = $mdp;
  }

  public function setRole ($role){
    $this->_role = $role;
  }

  //Déclaration de l'ensemble des getters //

  public function getNom(){return $this->_nom;}
  public function getPrenom(){return $this->_prenom;}
  public function getDateNaissance(){return $this->_date_naissance;}
  public function getMail(){return $this->_mail;}
  public function getAdresse(){return $this->_adresse;}
  public function getMutuelle(){return $this->_mutuelle;}
  public function getNumSecSoc(){return $this->_num_sec_soc;}
  public function getOptionChambre(){return $this->_option_chambre;}
  public function getRegime(){return $this->_regime;}
  public function getMdp(){return $this->_mdp;}
  public function getRole(){return $this->_role;}
}

?>
