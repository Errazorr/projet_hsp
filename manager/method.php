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

  public function connexion($connexion){
    //Test de connexion à la bdd //
    try{
      $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
    }
    catch (Exception $e){
      die('Erreur:'.$e->getMessage());
    }
    // Sélectionne les informations de la table compte en fonction de l'adresse mail //
    $req = $bdd->prepare('SELECT * FROM compte WHERE mail=?');
    $req->execute(array($connexion->getMail()));
    $donnees= $req->fetch();
    // Si la rêquette s'execute alors on redirige vers la page d'accueil //
    if ($donnees['mail'] == $connexion->getMail() AND $donnees['mdp'] == md5($connexion->getMdp())) {
      $_SESSION['nom'] = $donnees['nom'];
      $_SESSION['prenom'] = $donnees['prenom'];
      $_SESSION['mail'] = $connexion->getMail();
      header('Location: ../landing.php');
    }

<<<<<<< HEAD
    if ($donne['nom'] == $con->getNom() && $donne['prenom'] == $con->getPrenom() && $donne['mdp'] == $con->getMdp()) {
      $_SESSION['id'] = $donne['id'];
      $_SESSION['nom'] = $donne['nom'];
      $_SESSION['prenom'] = $donne['prenom'];

      if ($_SESSION['role'] == 'admin'){
       header('location: ../page_connexion.php');
      }
     else {
       header('location: ../accueilconnexion.php');
     }
   }
   else {
     echo '<body onLoad="alert(\'Erreur de connexion\')">';

     echo '<meta http-equiv="refresh" content="0;URL=../views/connexion.html">';
   }
=======
    else{
      // Si non on affiche une erreur et on redirige vers la page connexion//
      echo '<body onLoad="alert(\'Mail ou Mot de passe incorrect\')">';
>>>>>>> 92e5040bc4816bd4aed4eb75f42063e87b2dec75

      echo '<meta http-equiv="refresh" content="0;URL=../View/Connexion.php">';
    }
  }

 public function Reservation($rdv){
   $date_jour = date('Y-m-d');
   $date_consult = $rdv->getDateConsult();

   if ($date_consult < $date_jour) {
     echo '<body onLoad="alert(\'Date invalide\')">';

     echo '<meta http-equiv="refresh" content="0;URL=../views/prise_rdv.php">';
   }

   else{
     $bdd = new PDO('mysql:host=localhost;dbname=hopital;charset=utf8','root','');
     $res = $bdd->prepare('SELECT * FROM compte WHERE nom = :nom AND prenom = :prenom');
     $res ->execute(array(
       'nom' => $rdv->getNomPatient(),
       'prenom' => $rdv->getPrenomPatient()
     ));

     $patient = $res->fetch();

     if ($patient) {
       $bdd = new PDO('mysql:host=localhost;dbname=hopital;charset=utf8','root','');
       $res = $bdd->prepare('INSERT INTO reservation (nom_patient, nom_medecin, rais_consult, date_consult) VALUES (:nom_patient, :nom_medecin, :rais_consult, :date_consult)');
       $res ->execute(array(
         'nom_patient' => $rdv->getNomPatient(),
         'nom_medecin' => $rdv->getNomMedecin(),
         'rais_consult' => $rdv->getRaisonConsult(),
         'date_consult' => $rdv->getDateConsult()
       ));
     }
     else{
       echo '<body onLoad="alert(\'Patient introuvable\')">';

       echo '<meta http-equiv="refresh" content="0;URL=../views/prise_rdv.php">';
     }

  }
 }

}
 ?>
