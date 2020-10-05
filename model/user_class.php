<?php

class user {
// classe user reprenant les informations du manager, formulaire, model//

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

  public function setId ($id){
    $this->_id = $id;
  }

  public function setTel ($tel){
    $this->_tel = $tel;
  }

  public function setMail ($mail){
    $this->_mail = $mail;
  }

  public function setMdp ($mdp){
    $this->_mdp = $mdp;
  }

  //Déclaration de l'ensemble des getters //

  public function getNom(){return $this->_nom;}
  public function getPrenom(){return $this->_prenom;}
  public function getId(){return $this->_id;}
  public function getTel(){return $this->_tel;}
  public function getMail(){return $this->_mail;}
  public function getMdp(){return $this->_mdp;}
}

?>
