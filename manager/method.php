<?php

session_start();

class Method {

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
    //Test de connexion à la bdd //
    try{
      $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
    }
    catch (Exception $e){
      die('Erreur:'.$e->getMessage());
    }
    // Sélectionne les informations de la table compte en fonction du nom //
    $req = $bdd->prepare('SELECT * FROM compte WHERE nom=?');
    $req->execute(array($connexion->getNom()));
    $donnees= $req->fetch();
    // Si la rêquette s'execute alors on redirige vers la page d'accueil //
    if ($donnees['nom'] == $connexion->getNom() AND $donnees['prenom'] == $connexion->getPrenom() AND $donnees['mdp'] == md5($connexion->getMdp())) {
      $_SESSION['nom'] = $donnees['nom'];
      $_SESSION['prenom'] = $donnees['prenom'];
      $_SESSION['mdp'] = $donnees['mdp'];
      header('Location: ../traitement/page_index.php');
    }

    else{
      // Si non on affiche une erreur et on redirige vers la page connexion//
      echo '<body onLoad="alert(\'Mail ou Mot de passe incorrect\')">';

      echo '<meta http-equiv="refresh" content="0;URL=../View/Connexion.php">';
    }
  }

  }
 ?>
