<?php

try{
      $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
    }
catch (Exception $e){
      die('Erreur:'.$e->getMessage());
}

if (is_null($_POST['nom']) OR is_null($_POST['securite_sociale']) OR is_null($_POST['new_password']) OR is_null($_POST['new_password_confirm'])){
  echo '<body onLoad="alert(\'Veuillez remplir les zones vides\')">';
}

else{
  $req = $bdd->prepare('UPDATE mdp FROM compte_patient WHERE nom=? AND num_sec_soc=?');
  $req->execute(array($_POST['nom'], $_POST['securite_sociale']));
}
 ?>
