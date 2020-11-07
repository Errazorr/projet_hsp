<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Recuperation de données des page suivantes //
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/autoload.php';
class Method {

  private function dbConnect(){
     try{
           $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
           return $bdd;
         }
     catch (Exception $e){
           die('Erreur:'.$e->getMessage());
     }

  }

  public function Inscription($ins){
    $bdd = $this->dbConnect();
    if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date_naissance']) AND !empty($_POST['mail']) AND !empty($_POST['adresse']) AND !empty($_POST['mutuelle']) AND !empty($_POST['num_sec_soc'])
    AND !empty($_POST['mdp'])) {
      if (!is_numeric($_POST['nom']) && strlen($_POST['nom']) <= 30) {
        if (!is_numeric($_POST['prenom']) && strlen($_POST['prenom']) <= 30) {

      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $date_naissance = htmlspecialchars($_POST['date_naissance']);
      $mail = htmlspecialchars($_POST['mail']);
      $adresse = htmlspecialchars($_POST['adresse']);
      $mutuelle = htmlspecialchars($_POST['mutuelle']);
      $num_sec_soc = htmlspecialchars($_POST['num_sec_soc']);
      $option_chambre = htmlspecialchars($_POST['option_chambre']);
      $regime = htmlspecialchars($_POST['regime']);

    $req = $bdd->prepare('SELECT * FROM patient WHERE nom=? AND prenom=? AND mail=?');
    $req->execute(array($ins->getNom(), $ins->getPrenom(), $ins->getMail()));
    $donnees= $req->fetch();

    if ($donnees) {
      echo '<body onLoad="alert(\'Ce compte existe déjà\')">';

      echo '<meta http-equiv="refresh" content="0;URL=../views/inscription.html">';
    }
    else{
      $r = $bdd->prepare('INSERT INTO patient (nom, prenom, date_naissance, mail, adresse, mutuelle, num_sec_soc, option_chambre, regime, mdp, role, confirme) VALUES (:nom, :prenom, :date_naissance, :mail, :adresse, :mutuelle, :num_sec_soc, :option_chambre, :regime, :mdp, :role, :confirme)');
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
        'role' => 'patient',
        'confirme' => 0
      ));
      echo '<body onLoad="alert(\'Compte créé avec succès\')">';
      header('Location: ../views/connexion.php');
    }
  }
  else {
    echo '<body onLoad="alert(\'Veuillez entrer un nom valide ! \')">';

    echo '<meta http-equiv="refresh" content="0;URL=../views/inscription.html">'; }
  }

  else {
    echo '<body onLoad="alert(\'Veuillez entrer un nom valide ! \')">';

    echo '<meta http-equiv="refresh" content="0;URL=../views/inscription.html">'; }
}

else {
  echo '<body onLoad="alert(\'Veuillez remplir tous les champs !\')">';

  echo '<meta http-equiv="refresh" content="0;URL=../views/inscription.html">'; }

  $mail = new PHPMailer();
  $mail->isSMTP();                                            // Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username   = 'ryannathanslam@gmail.com';                     // SMTP username
  $mail->Password   = 'projethsp2020?';                               // SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
  $mail->Port       = 587;                                    // TCP port to connect to


  $mail->setFrom('ryannathanslam@gmail.com', 'Inscription');
  $mail->addAddress($ins->getMail(), 'Inscription réussie');     // Add a recipient //Recipients
   $mail->Body    =   'Bonjour et bienvenue sur le site de l\'hopital, merci de nous faire confiance';
  if(!$mail->Send()) {
    // Si l'envoie de mail ne s'excuté pas alors on affiche une erreur //
    echo '<body onLoad="alert(\'Erreur, mail non envoyé\')">';
  echo '<meta http-equiv="refresh" content="0;URL=../views/inscription.php">';
  } else {
    // Si l'envoie de mail est excuté alors on redirige vers la page d'accueil //

     header("location: ../views/connexion.php");
  }

}


  public function connexion($connexion){
    $bdd = $this->dbConnect();
    // Sélectionne les informations de la table compte en fonction de l'adresse mail //
    $req = $bdd->prepare('SELECT * FROM patient WHERE mail=?');
    $req->execute(array($connexion->getMail()));
    $donnees= $req->fetch();

    if ($donnees == null) {
      $req = $bdd->prepare('SELECT * FROM admin WHERE mail=?');
      $req->execute(array($connexion->getMail()));
      $donnees= $req->fetch();

      if ($donnees == null) {
        // Si non on affiche une erreur et on redirige vers la page connexion//
        echo '<body onLoad="alert(\'Compte inexistant\')">';
        session_destroy();
        echo '<meta http-equiv="refresh" content="0;URL=../views/connexion.php">';
      }
      else{
        // Si la rêquette s'execute alors on redirige vers la page d'accueil //
        if ($donnees['mail'] == $connexion->getMail() AND $donnees['mdp'] == md5($connexion->getMdp())) {
          $_SESSION['id'] = $donnees['id'];
          $_SESSION['nom'] = $donnees['nom'];
          $_SESSION['prenom'] = $donnees['prenom'];
          $_SESSION['mail'] = $connexion->getMail();
          $_SESSION['role'] = $donnees['role'];

          echo '<body onLoad="alert(\'Connexion réussie\')">';
          header('Location: ../page_index.php');
        }

        else{
          // Si non on affiche une erreur et on redirige vers la page connexion//
          echo '<body onLoad="alert(\'Mail ou Mot de passe incorrect\')">';
          session_destroy();
          echo '<meta http-equiv="refresh" content="0;URL=../views/connexion.php">';
        }
      }
    }

  else{
    if ($donnees['mail'] == $connexion->getMail() AND $donnees['mdp'] == md5($connexion->getMdp())) {
      $_SESSION['id'] = $donnees['id'];
      $_SESSION['nom'] = $donnees['nom'];
      $_SESSION['prenom'] = $donnees['prenom'];
      $_SESSION['mail'] = $connexion->getMail();
      $_SESSION['role'] = $donnees['role'];

      echo '<body onLoad="alert(\'Connexion réussie\')">';
      header('Location: ../page_index.php');
    }

    else{
      // Si non on affiche une erreur et on redirige vers la page connexion//
      echo '<body onLoad="alert(\'Mail ou Mot de passe incorrect\')">';
      session_destroy();
      echo '<meta http-equiv="refresh" content="0;URL=../views/connexion.php">';
    }
  }

  }


  public function connexion_medecin($connexion){
    $bdd = $this->dbConnect();
    // Sélectionne les informations de la table compte en fonction de l'adresse mail //
    $req = $bdd->prepare('SELECT * FROM medecin WHERE identifiant=?');
    $req->execute(array($connexion->getIdentifiant()));
    $donnees= $req->fetch();
    // Si la rêquette s'execute alors on redirige vers la page d'accueil //
    if ($donnees['identifiant'] == $connexion->getIdentifiant() AND $donnees['mdp'] == md5($connexion->getMdp())) {
      $_SESSION['nom_medecin'] = $donnees['nom'];
      $_SESSION['role'] = "medecin";

      echo '<body onLoad="alert(\'Connexion réussie\')">';
      header('Location: ../page_index.php');

    }

    else{
      // Si non on affiche une erreur et on redirige vers la page connexion//
      echo '<body onLoad="alert(\'Mail ou Mot de passe incorrect\')">';
      session_destroy();
      echo '<meta http-equiv="refresh" content="0;URL=../views/connexion_medecin.php">';
    }
  }


 public function Reservation($rdv){
   $bdd = $this->dbConnect();
   $date_jour = date('Y-m-d');
   $date_consult = $rdv->getDateConsult();

   if ($date_consult < $date_jour) {
     echo '<body onLoad="alert(\'Date invalide\')">';

     echo '<meta http-equiv="refresh" content="0;URL=../views/prise_rdv.php">';
   }

   else{
       $result = $bdd->prepare('INSERT INTO reservation (nom_patient, nom_medecin, date_consult, time_consult, rais_consult) VALUES (:nom_patient, :nom_medecin, :date_consult, :time_consult, :rais_consult)');
       $insert = $result ->execute(array(
         'nom_patient' => $_SESSION['nom'],
         'nom_medecin' => $rdv->getNomMedecin(),
         'date_consult' => $rdv->getDateConsult(),
         'time_consult' => $rdv->getTimeConsult(),
         'rais_consult' => $rdv->getRaisonConsult()
       ));
       echo '<body onLoad="alert(\'Réservation réussie\')">';
       header('Location: ../page_index.php');
     }
  }



 public function Modification($modif){
   $bdd = $this->dbConnect();
   $result = $bdd->prepare('UPDATE patient SET nom = ?, prenom = ?, date_naissance = ?, mail = ?, adresse = ?,
      mutuelle = ?, num_sec_soc = ?, option_chambre = ?, regime = ? WHERE id = ? ');
   $result ->execute(array(
     $modif->getNom(),
     $modif->getPrenom(),
     $modif->getDateNaissance(),
     $modif->getMail(),
     $modif->getAdresse(),
     $modif->getMutuelle(),
     $modif->getNumSecSoc(),
     $modif->getOptionChambre(),
     $modif->getRegime(),
     $_SESSION['id']
   ));
   echo '<body onLoad="alert(\'Compte modifié avec succès\')">';

   header('Location: ../page_index.php');
 }

 public function MotDePasse($mot_de_passe) {
   //Enregistre les données dans la BDD et rédireige en fonction du résultat //
   $bdd = $this->dbConnect();
   if (!empty($_POST['mail'])) {
     $mail = htmlspecialchars($_POST['mail']);
   $req = $bdd->prepare('SELECT * FROM patient WHERE mail=?');
   $req->execute(getMail());
   $donnees= $req->fetch();

   if ($donnees) {

       $mail = new PHPMailer();
       $mail->isSMTP();                                            // Send using SMTP
       $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
       $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
       $mail->Username   = 'ryannathanslam@gmail.com';                     // SMTP username
       $mail->Password   = 'projethsp2020?';                               // SMTP password
       $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
       $mail->Port       = 587;                                    // TCP port to connect to

       //Recipients
       $mail->setFrom('ryannathanslam@gmail.com', 'Mot de passe');
       $mail->addAddress($donnee->getmail(), 'Mot de passe');     // Add a recipient //Recipients
        $mail->Body    = "<a href='http://localhost/projet_hsp/projet_hsp/views/recuperation_mdp.php'>Réinitialiser mot de passe</a>";
     ;
     // Si l'envoie de mail s'effectue alors on redirige vers une page //
       if(!$mail->Send()) {
         echo '<body onLoad="alert(\'Erreur\')">';
       echo '<meta http-equiv="refresh" content="0;URL=../views/">';
     } else { // Si l'envoie de mail ne s'effectue pas alors on redirige vers une autre page //
        //  header("location: ../views/mdp_oublie.html"); //
       }
 }
} else {
  echo '<body onLoad="alert(\'Cette adresse mail n\'existe pas\')">';

  echo '<meta http-equiv="refresh" content="0;URL=../views/mdp_oublie.html">';
}
}

public function AddDoctor($add_doctor){
  $bdd = $this->dbConnect();
  $req = $bdd->prepare('SELECT * FROM medecin WHERE nom=? AND identifiant=?');
  $req->execute(array($add_doctor->getNom(), $add_doctor->getIdentifiant()));
  $donnees= $req->fetch();

  if ($donnees) {
    echo '<body onLoad="alert(\'Ce compte existe déjà\')">';

    echo '<meta http-equiv="refresh" content="0;URL=../views/add_doctor.php">';
  }

  else{
      $result = $bdd->prepare('INSERT INTO medecin (nom, lieu, specialite, identifiant, mdp, approuve) VALUES (:nom, :lieu, :specialite, :identifiant, :mdp, :approuve)');
      $insert = $result ->execute(array(
        'nom' => $add_doctor->getNom(),
        'lieu' => $add_doctor->getLieu(),
        'specialite' => $add_doctor->getSpecialite(),
        'identifiant' => $add_doctor->getIdentifiant(),
        'mdp' => md5($add_doctor->getMdp()),
        'approuve' => 1
      ));
      echo '<body onLoad="alert(\'Réservation réussie\')">';
      header('Location: ../views/add_doctor.php');
    }
 }

 public function AddAdmin($add_admin){
   $bdd = $this->dbConnect();
   $req = $bdd->prepare('SELECT * FROM admin WHERE nom=? AND prenom=? AND mdp=?');
   $req->execute(array($add_admin->getNom(), $add_admin->getPrenom(), $add_admin->getMdp()));
   $donnees= $req->fetch();

   if ($donnees) {
     echo '<body onLoad="alert(\'Ce compte existe déjà\')">';

     echo '<meta http-equiv="refresh" content="0;URL=../views/add_admin.php">';
   }

   else{
       $result = $bdd->prepare('INSERT INTO admin (nom, prenom, mail, mdp, role) VALUES (:nom, :prenom, :mail, :mdp, :role)');
       $insert = $result ->execute(array(
         'nom' => $add_admin->getNom(),
         'prenom' => $add_admin->getPrenom(),
         'mail' => $add_admin->getMail(),
         'mdp' => md5($add_admin->getMdp()),
         'role' => 'admin'
       ));
       echo '<body onLoad="alert(\'Ajout réussi\')">';
       header('Location: ../views/add_admin.php');
     }
  }
}
