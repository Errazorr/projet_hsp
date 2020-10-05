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

  public function setNom($nom){
  	$this->nom=$nom;
  }
  public function setPrenom($prenom){
  	$this->prenom=$prenom;
  }
  public function setDateNaissance($date_naissance){
  	$this->date_naissance=$date_naissance;
  }
  public function setMail($mail){
  	$this->mail=$mail;
  }
  public function setAdresse($adresse){
  	$this->adresse=$adresse;
  }
  public function setMutuelle($mutuelle){
  	$this->mutuelle=$mutuelle;
  }
  public function setNumSecSoc($num_sec_soc){
  	$this->num_sec_soc=$num_sec_soc;
  }
  public function setOptionChambre($option_chambre){
  	$this->option_chambre=$option_chambre;
  }
  public function setRegime($regime){
  	$this->regime=$regime;
  }
  public function setMdp($mdp){
  	$this->mdp=$mdp;
  }
  public function setRole($role){
  	$this->role=$role;
  }

  //Déclaration de l'ensemble des getters //

  public function getMail(){return $this->_mail;}
  public function getMdp(){return $this->_mdp;}
}

?>
