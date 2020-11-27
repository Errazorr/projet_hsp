<?php
//DEBUT DE SESSION
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Recuperation de données des page suivantes //
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/autoload.php';
class Method {

  //METHODES DE CONNEXION A LA BDDS
  private function dbConnect(){
     try{
           $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
           return $bdd;
         }
     catch (Exception $e){
           die('Erreur:'.$e->getMessage());
     }

  }

  //METHODE INSCRIPTION
  public function Inscription($ins){
    //CONNEXION BDD
    $bdd = $this->dbConnect();
    //SI LES CHAMPS NE SONT PAS VIDES
    if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date_naissance']) AND !empty($_POST['mail']) AND !empty($_POST['adresse']) AND !empty($_POST['mutuelle']) AND !empty($_POST['num_sec_soc'])
    AND !empty($_POST['mdp'])) {
      //SI LE NOM EST UNE CHAINE DE MOINS DE 30 CARACTERES
      if (!is_numeric($_POST['nom']) && strlen($_POST['nom']) <= 30) {
        //SI LE PRENOM EST UNE CHAINE DE MOINS DE 30 CARACTERES
        if (!is_numeric($_POST['prenom']) && strlen($_POST['prenom']) <= 30) {

          //ENREGISTREMENT DES DONNEES DANS DES VARIABLES
      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $date_naissance = htmlspecialchars($_POST['date_naissance']);
      $mail = htmlspecialchars($_POST['mail']);
      $adresse = htmlspecialchars($_POST['adresse']);
      $mutuelle = htmlspecialchars($_POST['mutuelle']);
      $num_sec_soc = htmlspecialchars($_POST['num_sec_soc']);
      $option_chambre = htmlspecialchars($_POST['option_chambre']);
      $regime = htmlspecialchars($_POST['regime']);

      //SELECT DANS LA BDD
    $req = $bdd->prepare('SELECT * FROM patient WHERE nom=? AND prenom=? AND mail=?');
    $req->execute(array($ins->getNom(), $ins->getPrenom(), $ins->getMail()));
    $donnees= $req->fetch();

    //SI IL TROUVE QUELQUE CHOSE
    if ($donnees) {
      //MESSAGE D'ERREUR
      echo '<body onLoad="alert(\'Ce compte existe déjà\')">';

      echo '<meta http-equiv="refresh" content="0;URL=../views/inscription.html">';
    }
    //SI IOL NE TROUVE PAS
    else{
      //ON ENREGISTRE DANS LA TABLE LES DONNEES
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
      //MESSAGE DE SUCCES
      echo '<body onLoad="alert(\'Compte créé avec succès\')">';
      header('Location: ../views/connexion.php');
    }
  }
  //SI LE PRENOM EST UNE CHAINE DE PLUS DE 30 CARACTERES OU N'EST PAS UNC HAINE DE CARACTERES
  else {
    echo '<body onLoad="alert(\'Veuillez entrer un prenom valide ! \')">';

    echo '<meta http-equiv="refresh" content="0;URL=../views/inscription.html">'; }
  }
//SI LE NOM EST UNE CHAINE DE PLUS DE 30 CARACTERES OU N'EST PAS UNC HAINE DE CARACTERES
  else {
    echo '<body onLoad="alert(\'Veuillez entrer un nom valide ! \')">';

    echo '<meta http-equiv="refresh" content="0;URL=../views/inscription.html">'; }
}
//SI UN DES CHAMPS EST VIDE
else {
  echo '<body onLoad="alert(\'Veuillez remplir tous les champs !\')">';

  echo '<meta http-equiv="refresh" content="0;URL=../views/inscription.html">'; }

//ENVOI DE MAIL
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

  //METHODE DE CONNEXION
  public function connexion($connexion){
    //CONNEXION BDD
    $bdd = $this->dbConnect();
    // RECHERCHE DANS LA TABLE PATIENT SI LE MAIL EXISTE
    $req = $bdd->prepare('SELECT * FROM patient WHERE mail=?');
    $req->execute(array($connexion->getMail()));
    $patient= $req->fetch();
    //SI NON TROUVE DANS PATIENT
    if ($patient == null) {
      //RECHERCHE DANS ADMIN
      $req = $bdd->prepare('SELECT * FROM admin WHERE mail=?');
      $req->execute(array($connexion->getMail()));
      $admin= $req->fetch();

      if ($admin == null) {//SI NON TROUVE
        $req = $bdd->prepare('SELECT * FROM medecin WHERE mail=?');
        $req->execute(array($connexion->getMail()));
        $medecin= $req->fetch();

        if ($medecin == null) {//SI NON TROUVE
          // On affiche une erreur et on redirige vers la page connexion//
          echo '<body onLoad="alert(\'Compte inexistant\')">';
          session_destroy();
          echo '<meta http-equiv="refresh" content="0;URL=../views/connexion.php">';
        }

        else{
          if ($medecin['mail'] == $connexion->getMail() AND $medecin['mdp'] == md5($connexion->getMdp())) {
            $_SESSION['nom_medecin'] = $medecin['nom'];
            $_SESSION['mail_medecin'] = $medecin['mail'];
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
      }
      else{
        // Si la rêquette s'execute alors on redirige vers la page d'accueil //
        if ($admin['mail'] == $connexion->getMail() AND $admin['mdp'] == md5($connexion->getMdp())) {
          $_SESSION['id'] = $admin['id'];
          $_SESSION['nom'] = $admin['nom'];
          $_SESSION['prenom'] = $admin['prenom'];
          $_SESSION['mail'] = $connexion->getMail();
          $_SESSION['role'] = $admin['role'];

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
    //SI TROUVE DANS PATIENT
    if ($patient['mail'] == $connexion->getMail() AND $patient['mdp'] == md5($connexion->getMdp())) {
      $_SESSION['id'] = $patient['id'];
      $_SESSION['nom'] = $patient['nom'];
      $_SESSION['prenom'] = $patient['prenom'];
      $_SESSION['mail'] = $connexion->getMail();
      $_SESSION['role'] = $patient['role'];

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



//METHODE DE RESERVATION
 public function Reservation($rdv){
   //CONNEXION BDD
   $bdd = $this->dbConnect();
   //RECUPERATION DE LA DATE DU JOUR
   $date_jour = date('Y-m-d');
   //DATE DE RESERVATION MINIMUM 3 JOURS A L'AVANCE
   $date_min = date('Y-m-d', strtotime($date_jour. ' + 3 days'));
   //RECUPERATION DE LA DATE DE LA CONSULTATION
   $date_consult = $rdv->getDateConsult();

   //SI LA DATE DE RESERVATION EST DANS LE FUTUR OU DANS MOINS DE 3 JOURS
   if ($date_consult < $date_min) {
     //MESSAGE D'ERREUR
     echo '<body onLoad="alert(\'Date invalide\')">';

     echo '<meta http-equiv="refresh" content="0;URL=../views/prise_rdv.php">';
   }

   else{
     $reserv_exists = $bdd->prepare('SELECT * FROM reservation WHERE nom_medecin = ? AND date_consult = ? AND time_consult = ?');
     $reserv_exists->execute(array($rdv->getNomMedecin(),
                                    $rdv->getDateConsult(),
                                    $rdv->getTimeConsult()));
    $reserv_exists->fetchall();

    if($reserv_exists){
      //MESSAGE D'ERREUR
      echo '<body onLoad="alert(\'Ce médecin a déjà un rendez-vous à cette heure-ci\')">';

      echo '<meta http-equiv="refresh" content="0;URL=../views/prise_rdv.php">';
    }
    else{
     //SINON ON EXECUTE LA REQUETE D'INSERTION DANS LA TABLE
       $result = $bdd->prepare('INSERT INTO reservation (nom_patient, nom_medecin, date_consult, time_consult, rais_consult) VALUES (:nom_patient, :nom_medecin, :date_consult, :time_consult, :rais_consult)');
       $insert = $result ->execute(array(
         'nom_patient' => $_SESSION['nom'],
         'nom_medecin' => $rdv->getNomMedecin(),
         'date_consult' => $rdv->getDateConsult(),
         'time_consult' => $rdv->getTimeConsult(),
         'rais_consult' => $rdv->getRaisonConsult()
       ));
       //MESSAGE DE SUCCES
       echo '<body onLoad="alert(\'Réservation réussie\')">';
       header('Location: ../page_index.php');
     }
   }
  }


//METHODE DE MODIFICATION DU COMPTE
 public function Modification($modif){
   //CONNEXION A LA BDD
   $bdd = $this->dbConnect();
   //REQUETE POUR UPDATE LA TABLE EN FONCTION DE L'ID
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
   //MESSAGE DE SUCCES
   echo '<body onLoad="alert(\'Compte modifié avec succès\')">';

   header('Location: ../page_index.php');
 }

 //METHODE POUR CHANGER SON MDP
 public function MotDePasse($mot_de_passe) {
   //CONNEXION BDD
   $bdd = $this->dbConnect();
   //SI LE MAIL N'EST PAS VIDE
   if (!empty($_POST['mail'])) {
     $mail = htmlspecialchars($_POST['mail']);
     //RECHERCHE DE L'ADRESSE MAIL DANS LA TABLE
   $req = $bdd->prepare('SELECT * FROM patient WHERE mail=?');
   $req->execute(getMail());
   $donnees= $req->fetch();

   //SI IL TROUVE
   if ($donnees) {

     //ENVOI DU MAIL
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
     // SI ENVOI DE MAIL ECHOUE
       if(!$mail->Send()) {
         //MESSAGE D'ERREUR
         echo '<body onLoad="alert(\'Erreur\')">';
       echo '<meta http-equiv="refresh" content="0;URL=../views/">';
     } else { // Si l'envoie de mail ne s'effectue pas alors on redirige vers une autre page //
        //  header("location: ../views/mdp_oublie.html"); //
       }
 }
}
//SI LE MAIL N'EXISTE PAS
else {
  //MESSAGE D'ERREUR
  echo '<body onLoad="alert(\'Cette adresse mail n\'existe pas\')">';

  echo '<meta http-equiv="refresh" content="0;URL=../views/mdp_oublie.html">';
}
}


//METHODE POUR AJOUTER UN DOCTEUR
public function AddDoctor($add_doctor){
  //CONNEXION BDD
  $bdd = $this->dbConnect();
  //RECHERCHE DU MEDECIN DANS LA TABLE
  $req = $bdd->prepare('SELECT * FROM medecin WHERE nom=? AND identifiant=?');
  $req->execute(array($add_doctor->getNom(), $add_doctor->getIdentifiant()));
  $donnees= $req->fetch();

  //SI IL TROUVE
  if ($donnees) {
    //MESSAGE D'ERREUR
    echo '<body onLoad="alert(\'Ce compte existe déjà\')">';

    echo '<meta http-equiv="refresh" content="0;URL=../views/add_doctor.php">';
  }

  //SI IL NE TROUVE PAS
  else{
    //INSERTION DANS LA TABLE DU NOUVEAU MEDECIN
      $result = $bdd->prepare('INSERT INTO medecin (nom, lieu, specialite, identifiant, mdp, approuve) VALUES (:nom, :lieu, :specialite, :identifiant, :mdp, :approuve)');
      $insert = $result ->execute(array(
        'nom' => $add_doctor->getNom(),
        'lieu' => $add_doctor->getLieu(),
        'specialite' => $add_doctor->getSpecialite(),
        'identifiant' => $add_doctor->getIdentifiant(),
        'mdp' => md5($add_doctor->getMdp()),
        'approuve' => 1
      ));
      //MESSAGE DE SUCCES
      echo '<body onLoad="alert(\'Réservation réussie\')">';
      header('Location: ../views/add_doctor.php');
    }
 }

//METHODE POUR AJOUTER UN ADMIN
 public function AddAdmin($add_admin){
   //CONNEXION BDD
   $bdd = $this->dbConnect();
   //RECHERCHE DE L'ADMIN DANS LA TABLE
   $req = $bdd->prepare('SELECT * FROM admin WHERE nom=? AND prenom=? AND mail=?');
   $req->execute(array($add_admin->getNom(), $add_admin->getPrenom(), $add_admin->getMail()));
   $donnees= $req->fetch();

//SI IL TROUVE
   if ($donnees) {
     //MESSAGE D'ERREUR
     echo '<body onLoad="alert(\'Ce compte existe déjà\')">';

     echo '<meta http-equiv="refresh" content="0;URL=../views/add_admin.php">';
   }
//SI IL NE TROUVE PAS
   else{
     //INSERTION DANS LA TABLE DU NOUVEL ADMIN
     $mdp_hasher = md5($add_admin->getMdp());
       $result = $bdd->prepare('INSERT INTO admin (nom, prenom, mail, mdp, role) VALUES (?, ?, ?, ?, ?)');
       $insert = $result ->execute(array(
         $add_admin->getNom(),
         $add_admin->getPrenom(),
         $add_admin->getMail(),
         $mdp_hasher,
         'admin'
       ));
       //MESSAGE DE SUCCES
       echo '<body onLoad="alert(\'Ajout réussi\')">';
       header('Location: ../views/add_admin.php');
     }
  }
}
