<?php

session_start();

class Manager {

  public function Inscription($ins){
    $bdd = new PDO('mysql:host=localhost;dbname=hopital;charset=utf8','root','');
    $r = $bdd->prepare('INSERT INTO compte (nom, prenom, date_naissance, mail, adresse, mutuelle, num_sec_soc, option_chambre, regime, mdp, role) VALUES (:nom, :prenom, :date_naissance, :mail, :adresse, :mutuelle, :num_sec_soc, :option_chambre, :regime, :mdp, :role)');
    $r ->execute(array(
      'nom' => $ins->getNom(),
      'prenom' => $ins->getPrenom(),
      'date_naissance' => $ins->getDateNaissance(),
      'mail' => $ins->getMail(),
      'adresse' => $ins->getAdresse(),
      'mutuelle' => $ins->getMutuelle(),
      'num_sec_soc' => $ins->getNumSecSoc(),
      'option_chambre' => $ins->getOptionChambre(),
      'regime' => $ins->getRegime(),
      'mdp' => md5($ins->getMdp()),
      'role' => 'patient'
    ));
  }

  public function Connexion($con){
     $bdd = new PDO('mysql:host=localhost;dbname=hopital;charset=utf8','root','');
     $r = $bdd->prepare('SELECT * FROM compte_patient WHERE nom = :nom AND prenom = :prenom AND date_naissance = :date_naissance AND mail = :mail AND adresse = :adresse AND mutuel = :mutuelle AND num_sec_soc = :num_sec_soc AND tv = :tv AND wifi = :wifi AND regime = :regime AND mdp = :mdp');
     $r -> execute(array(
       'nom' => $con->getNom(),
       'prenom' => $con->getPrenom(),
       'date_naissance' => $con->getDate_naissance(),
       'mail' => $con->getMail(),
       'adresse' => $con->getAdresse(),
       'mutuelle' => $con->getMutuelle(),
       'num_sec_soc' => $con->getNum_sec_soc(),
       'tv' => $con->getTv(),
       'wifi' => $con->getWifi(),
       'regime' => $con->getRegime(),
       'mdp' => $con->getMdp()
     ));
    $donne=$r->fetch();

    if ($donne['nom'] == $con->getNom() && $donne['prenom'] == $con->getPrenom() && $donne['mdp'] == $con->getMdp()) {
      $_SESSION['id'] = $donne['id'];
      $_SESSION['nom'] = $donne['nom'];
      $_SESSION['prenom'] = $donne['prenom'];
      if ($_SESSION['role'] == admin){
       header('location: ../page_connexion.php');
     }
     else {
     header('location: ../accueilconnexion.php');
     }
   }
   else {
     echo 'erreur';
   }

 }

  }
 ?>
