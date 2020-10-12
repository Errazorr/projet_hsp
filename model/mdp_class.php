<?php

class ModifMdp {
  private $mail;

  public function __construct($mail) {
  	$this->setMail($mail);
  }

	public function getMail(){return $this->mail;}


  public function setMail($mail){
  	$this->mail=$mail;
  }


}
 ?>
