<?php
session_start();
//envoie des données vers les pages suivantes //
require '../model/medecin_class.php';
require '../manager/method.php';

if (is_null($_POST['identifiant'] OR is_null($_POST['mdp']))){
  echo '<body onLoad="alert(\'Veuillez remplir les zones vides\')">';
}

else{
  //Enregistrement des données //
  $connexion = new Medecin(['identifiant' =>$_POST['identifiant'],
                            'mdp' =>$_POST['mdp']]);
  $connect = new Method; //Déclaration d'une nouvelle methode //
  $connect->connexion_medecin($connexion);
}

?>
