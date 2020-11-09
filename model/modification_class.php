<?php

class Modification {
	//ATTRIBUTS
	protected $nom;
	protected $prenom;
  protected $date_naissance;
  protected $mail;
  protected $adresse;
  protected $mutuelle;
  protected $num_sec_soc;
  protected $option_chambre;
  protected $regime;

public function __construct($nom, $prenom, $date_naissance, $mail, $adresse, $mutuelle, $num_sec_soc, $option_chambre, $regime) {
	$this->setNom($nom);
	$this->setPrenom($prenom);
  $this->setDateNaissance($date_naissance);
  $this->setMail($mail);
  $this->setAdresse($adresse);
  $this->setMutuelle($mutuelle);
  $this->setNumSecSoc($num_sec_soc);
  $this->setOptionChambre($option_chambre);
  $this->setRegime($regime);
}

//GETTER
public function getNom(){return $this->nom;}
public function getPrenom(){return $this->prenom;}
public function getDateNaissance(){return $this->date_naissance;}
public function getMail(){return $this->mail;}
public function getAdresse(){return $this->adresse;}
public function getMutuelle(){return $this->mutuelle;}
public function getNumSecSoc(){return $this->num_sec_soc;}
public function getOptionChambre(){return $this->option_chambre;}
public function getRegime(){return $this->regime;}

//SETTER
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

}
 ?>
