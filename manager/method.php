<?php
//DEBUT DE SESSION
session_start();

// PHP MAILER POUR ENVOI DE MAIL
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Recuperation de données des page suivantes //
require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';
require '../vendor/autoload.php';
class Method {

  //METHODES DE CONNEXION A LA BDDS
  private function dbConnect(){
     try{
           $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','nathan','oskour');
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
    if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date_naissance']) AND !empty($_POST['mail']) AND !empty($_POST['num_sec_soc'])
    AND !empty($_POST['mdp'])) {
      //SI LE NOM EST UNE CHAINE DE MOINS DE 30 CARACTERES
      if (!is_numeric($_POST['nom']) && strlen($_POST['nom']) <= 20) {
        //SI LE PRENOM EST UNE CHAINE DE MOINS DE 30 CARACTERES
        if (!is_numeric($_POST['prenom']) && strlen($_POST['prenom']) <= 20) {
          if (is_numeric($_POST['num_sec_soc'])) {

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
    $req = $bdd->prepare('SELECT count(*) as numberEmail FROM patient WHERE mail=?');
    $req->execute(array($ins->getMail()));
    $email_verification = $req->fetch();

    $reqq = $bdd->prepare('SELECT count(*) as numberNum FROM patient WHERE num_sec_soc=?');
    $reqq->execute(array($ins->getNumSecSoc()));
    $num_verification = $reqq->fetch();

      if($email_verification['numberEmail'] != 1 AND $num_verification['numberNum'] != 1){

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
            'confirme' => 'oui'
          ));
          //MESSAGE DE SUCCES
          echo '<body onLoad="alert(\'Compte créé avec succès\')">';
          header('Location: ../views/connexion.php');

			}
      else {

      header('location:../views/inscription.php?ins_err=existe');
      exit();
}

  }

  else {
    session_destroy();
    header('location:../views/inscription.php?ins_err=numsecsoc');
  }

}

  //SI LE PRENOM EST UNE CHAINE DE PLUS DE 30 CARACTERES OU N'EST PAS UNC HAINE DE CARACTERES
else {
  session_destroy();
  header('location:../views/inscription.php?ins_err=prenom');
     }
  }
//SI LE NOM EST UNE CHAINE DE PLUS DE 30 CARACTERES OU N'EST PAS UNC HAINE DE CARACTERES
  else {
    session_destroy();
    header('location:../views/inscription.php?ins_err=nom');
  }
}
//SI UN DES CHAMPS EST VIDE
else {
  session_destroy();
  header('location:../views/inscription.php?ins_err=champs');
}

//ENVOI DE MAIL
//Send mail

      $mailto = $mail;

      // Load Composer's autoloader
      require '../vendor/autoload.php';
      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);
try {
          //Server settings
          //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'ryannathanslam@gmail.com';                     // SMTP username
          $mail->Password   = 'projethsp2020?';                               // SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
          $mail->Port       = 587;                                    // TCP port to connect to
          //Recipients
          $mail->setFrom('ryannathanslam@gmail.com', 'Ryan');
          $mail->addAddress($mailto);     // Add a recipient
          if(isset($mail)){
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->Subject = 'Inscription - Hopital';
              $mail->Body    = "Bonjour et bienvenue sur le site officiel. Nous vous souhaitons un agréable moment. Pour toute information, contactez-nous via le formulaire de contact.";
              $mail->AltBody = 'This is the body in plain text for non-HTML mail client';
              $mail->send();
              header("Location:../index.php");
          }
      }
catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
          session_destroy();
          header('location:../views/connexion.php?login_errr=compteinexistant');
        }

        else{
          if($medecin['approuve'] == 'non')
          {
            session_destroy();
            header('location:../views/connexion.php?login_errr=comptedesactive');
          }
          elseif ($medecin['mail'] == $connexion->getMail() AND $medecin['mdp'] == md5($connexion->getMdp())) {
            $_SESSION['id'] = $medecin['id'];
            $_SESSION['nom_medecin'] = $medecin['nom'];
            $_SESSION['mail_medecin'] = $medecin['mail'];
            $_SESSION['role'] = "medecin";

            echo '<body onLoad="alert(\'Connexion réussie\')">';
            header('Location: ../index.php?connexion=medvrai');

          }

          else{
            // Si non on affiche une erreur et on redirige vers la page connexion//
            session_destroy();
            header('location:../views/connexion.php?login_errr=medecinnon');
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

          header('Location: ../index.php?connexion=adminvrai');
        }

        else{
          // Si non on affiche une erreur et on redirige vers la page connexion//
          session_destroy();
          header('location:../views/connexion.php?login_errr=adminnon');
        }
      }
    }

  else{

        if($patient['confirme'] == 'non')
        {
          session_destroy();
          header('location:../views/connexion.php?login_errr=comptedesactive');
        }
    //SI TROUVE DANS PATIENT
    elseif ($patient['mail'] == $connexion->getMail() AND $patient['mdp'] == md5($connexion->getMdp())) {
      $_SESSION['id'] = $patient['id'];
      $_SESSION['nom'] = $patient['nom'];
      $_SESSION['prenom'] = $patient['prenom'];
      $_SESSION['mail'] = $connexion->getMail();
      $_SESSION['role'] = $patient['role'];


      header('Location: ../index.php?connexion=patientvrai');
    }

    else{
      // Si non on affiche une erreur et on redirige vers la page connexion//
      session_destroy();
        header('location:../views/connexion.php?login_errr=patientnon');
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
  header('location:../views/prise_rdv.php?rdv_err=date');
   }

   else{
     $check_reserv_exists = $bdd->prepare('SELECT * FROM reservation WHERE nom_medecin = ? AND date_consult = ? AND time_consult = ?');
     $reserv_exists = $check_reserv_exists->execute(array($rdv->getNomMedecin(),
                                                          $rdv->getDateConsult(),
                                                          $rdv->getTimeConsult()));
    $check_reserv_exists->fetchall();

    var_dump($rdv->getNomMedecin());
    var_dump($rdv->getDateConsult());

    if(empty($check_reserv_exists)){
      //MESSAGE D'ERREUR
      header('location:../views/prise_rdv.php?rdv_err=exist');
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
       header('Location: ../index.php');
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

   header('Location: ../index.php');
 }


//METHODE POUR AJOUTER UN DOCTEUR
public function AddDoctor($add_doctor){
  //CONNEXION BDD
  $bdd = $this->dbConnect();
  //RECHERCHE DU MEDECIN DANS LA TABLE
  $req = $bdd->prepare('SELECT * FROM medecin WHERE nom=? AND mail=?');
  $req->execute(array($add_doctor->getNom(), $add_doctor->getMail()));
  $donnees= $req->fetch();

  //SI IL TROUVE
  if ($donnees) {
    //MESSAGE D'ERREUR
    header('location:../admin/admin/index.php?add_err=medecin');
  }

  //SI IL NE TROUVE PAS
  else{
    //INSERTION DANS LA TABLE DU NOUVEAU MEDECIN
      $result = $bdd->prepare('INSERT INTO medecin (nom, lieu, specialite, mail, mdp, approuve, image) VALUES (?, ?, ?, ?, ?, ?, ?)');
      $insert = $result ->execute(array(
        $add_doctor->getNom(),
        $add_doctor->getLieu(),
        $add_doctor->getSpecialite(),
        $add_doctor->getMail(),
        md5($add_doctor->getMdp()),
        'oui',
        $add_doctor->getImage()
      ));
      //MESSAGE DE SUCCES
      echo '<body onLoad="alert(\'Création de nouveau médecin réussie\')">';
      header('Location: ../admin/admin/index.php');
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
    header('location:../admin/admin/index.php?add_err=admin');
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
       header('Location: ../admin/admin/index.php');
     }
  }

  public function AddPatient($add_patient){
    //CONNEXION BDD
    $bdd = $this->dbConnect();
    //RECHERCHE DE L'ADMIN DANS LA TABLE
    $req = $bdd->prepare('SELECT * FROM patient WHERE nom=? AND prenom=? AND mail=?');
    $req->execute(array($add_patient->getNom(), $add_patient->getPrenom(), $add_patient->getMail()));
    $donnees= $req->fetch();

 //SI IL TROUVE
    if ($donnees) {
      //MESSAGE D'ERREUR
    header('location:../admin/admin/index.php?add_err=patient');
    }
 //SI IL NE TROUVE PAS
    else{
      //INSERTION DANS LA TABLE DU NOUVEL ADMIN
      $r = $bdd->prepare('INSERT INTO patient (nom, prenom, date_naissance, mail, adresse, mutuelle, num_sec_soc, option_chambre, regime, mdp, role, confirme, image) VALUES (:nom, :prenom, :date_naissance, :mail, :adresse, :mutuelle, :num_sec_soc, :option_chambre, :regime, :mdp, :role, :confirme, :image)');
      $r ->execute(array(
        'nom' => $add_patient->getNom(),
        'prenom' => $add_patient->getPrenom(),
        'date_naissance' => $add_patient->getDateNaissance(),
        'mail' => $add_patient->getMail(),
        'adresse' => $add_patient->getAdresse(),
        'mutuelle' => $add_patient->getMutuelle(),
        'num_sec_soc' => $add_patient->getNumSecSoc(),
        'option_chambre' => $add_patient->getOptionChambre(),
        'regime' => $add_patient->getRegime(),
        'mdp' => md5($add_patient->getMdp()),
        'role' => 'patient',
        'confirme' => 'oui',
        'image' => $add_patient->getImage()
      ));
        //MESSAGE DE SUCCES
        echo '<body onLoad="alert(\'Ajout réussi\')">';
        header('Location: ../admin/admin/index.php');
      }
   }

   public function ContactUs($contact) {
     //CONNEXION BDD
     $bdd = $this->dbConnect();
       //INSERTION DANS LA TABLE DU NOUVEL ADMIN
         $result = $bdd->prepare('INSERT INTO contact (nom, mail, message, sujet) VALUES (?, ?, ?, ?)');
         $insert = $result ->execute(array(
           $contact->getNom(),
           $contact->getMail(),
           $contact->getMessage(),
           $contact->getSujet()
         ));
         if($insert) {
         echo '<body onLoad="alert(\'Message envoyé\')">';
         header('Location: ../index.php');
       }
   }

}
