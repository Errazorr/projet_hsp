<?php

class Manager {

  public function Inscription($ins){
    $bdd = new PDO('mysql:host=localhost;dbname=hopital;charset=utf8','root','');
    $r = $bdd->prepare('INSERT INTO compte_patient (nom, prenom, date_naissance, mail, adresse, mutuelle, num_sec_soc, tv, wifi, regime, mdp) VALUES (:nom, :prenom, :date_naissance, :mail, :adresse, :mutuelle, :num_sec_soc, :tv, :wifi, :regime, :mdp)');
    $r ->execute(array(
      'nom' => $ins->getNom(),
      'prenom' => $ins->getPrenom(),
      'date_naissance' => $ins->getDate_naissance(),
      'mail' => $ins->getMail(),
      'adresse' => $ins->getAdresse(),
      'mutuelle' => $ins->getMutuelle(),
      'num_sec_soc' => $ins->getNum_sec_soc(),
      'tv' => $ins->getTv(),
      'wifi' => $ins->getWifi(),
      'regime' => $ins->getRegime(),
      'mdp' => $ins->getMdp()
    ))
  }


}
 ?>
