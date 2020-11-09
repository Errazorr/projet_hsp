<?php

class ModifMdp {
  //ATTRIBUT
  private $mail;

  public function __construct($mail) {
  	$this->setMail($mail);
  }

//GETTER
	public function getMail(){return $this->mail;}

//SETTER
  public function setMail($mail){
  	$this->mail=$mail;
  }


}
 ?>
