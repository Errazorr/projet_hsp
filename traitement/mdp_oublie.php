<?php

try{
      $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
    }
catch (Exception $e){
      die('Erreur:'.$e->getMessage());
}

if (is_null($_POST['nom']) OR is_null($_POST['securite_sociale']) OR is_null($_POST['new_password']) OR is_null($_POST['new_password_confirm'])){
  echo '<body onLoad="alert(\'Veuillez remplir les zones vides\')">';

  echo '<meta http-equiv="refresh" content="0;URL=../views/mdp_oublie.html">';
}

else{
  $req = $bdd->prepare('SELECT * FROM compte WHERE nom=? AND num_sec_soc=?');
  $req->execute(array($_POST['nom'], $_POST['securite_sociale']));
  $resultat = $req->fetch();

  if($resultat){
    $req = $bdd->prepare('UPDATE `compte` SET `mdp`=? WHERE `nom`=? AND `num_sec_soc`=?');
    $update_request = $req->execute(array(md5($_POST['new_password']), $_POST['nom'], $_POST['securite_sociale']));
    echo '<body onLoad="alert(\'Le mot de passe a bien été modifié\')">';

    echo '<meta http-equiv="refresh" content="0;URL=../views/mdp_oublie.html">';
  }
  else{
    echo '<body onLoad="alert(\'Ce compte est introuvable\')">';

    echo '<meta http-equiv="refresh" content="0;URL=../views/mdp_oublie.html">';
  }
}

var_dump($update_request);
?>
