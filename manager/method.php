<?php
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
    AND !empty($_POST['option_chambre']) AND !empty($_POST['regime']) AND !empty($_POST['mdp'])) {

      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $date_naissance = htmlspecialchars($_POST['date_naissance']);
      $mail = htmlspecialchars($_POST['mail']);
      $adresse = htmlspecialchars($_POST['adresse']);
      $mutuelle = htmlspecialchars($_POST['mutuelle']);
      $num_sec_soc = htmlspecialchars($_POST['num_sec_soc']);
      $option_chambre = htmlspecialchars($_POST['option_chambre']);
      $regime = htmlspecialchars($_POST['regime']);
    $req = $bdd->prepare('SELECT * FROM compte WHERE nom=? AND prenom=? AND mail=?');
    $req->execute(array($ins->getNom(), $ins->getPrenom(), $ins->getMail()));
    $donnees= $req->fetch();

    if ($donnees) {
      echo '<body onLoad="alert(\'Ce compte existe déjà\')">';

      echo '<meta http-equiv="refresh" content="0;URL=../views/inscription.html">';
    }
    else{
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
      header('Location: ../page_index.php');
    }
  }
  } else {
    echo '<body onLoad="alert(\'Veuillez remplir tous les champs !\')">';

    echo '<meta http-equiv="refresh" content="0;URL=../views/inscription.html">';
}
}

  public function connexion($connexion){
    $bdd = $this->dbConnect();
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

    else{
      // Si non on affiche une erreur et on redirige vers la page connexion//
      echo '<body onLoad="alert(\'Mail ou Mot de passe incorrect\')">';

      echo '<meta http-equiv="refresh" content="0;URL=../views/connexion.php">';
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
     $res = $bdd->prepare('SELECT * FROM compte WHERE nom = :nom AND prenom = :prenom');
     $res ->execute(array(
       'nom' => $rdv->getNomPatient(),
       'prenom' => $rdv->getPrenomPatient()
     ));

     $patient = $res->fetch();

     if ($patient) {
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
  header('Location: ../page_index.php');
 }

}
