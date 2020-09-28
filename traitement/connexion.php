<?php

require('../manager/method.php');
require('../model/connexion_class.php');

if(is_null($_POST['nom'] OR is__null($_POST['prenom'] OR is_null($_POST['mdp'])))) {
  echo '<body onLoad="alert(\'Veuillez remplir les zones vides\')">';
}

else {
  //Enregistrement des données //
  $connexion = new Connexion(['nom' => $_POST['nom'],
                              'prenom' => $_POST['prenom'],
                              'mdp' => $_POST['mdp']]);

$connect = new Method;
$connect->Connexion($connexion),
}
 ?>
