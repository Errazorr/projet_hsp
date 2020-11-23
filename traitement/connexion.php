<?php
session_start();
//envoie des données vers les pages suivantes //
require '../model/user_class.php';
require '../manager/method.php';

if (is_null($_POST['mail'] OR is_null($_POST['mdp']))){
  echo '<body onLoad="alert(\'Veuillez remplir les zones vides\')">';
}

else{
  //Enregistrement des données //
  $connexion = new User(['mail' =>$_POST['mail'],
                        'mdp' =>$_POST['mdp']]);
  $connect = new Method; //Déclaration d'une nouvelle methode //
  $connect->connexion($connexion);
  $_SESSION['mail'] = $_POST['mail'];
}

?>
