<?php

if(!empty($_POST) && !empty($_POST['mail'])) {

  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root',''); // Connexion à la bdd

  $req = $bdd->prepare('SELECT * FROM compte WHERE mail = ?');

  $req->execute([$_POST['mail']]);

  $user = $req->fetch();

  if ($user) {
    session_start();

    $bdd->prepare('UPDATE compte SET mdp = ? WHERE id = ?');
    $bdd->execute([$user->id]);

    header('page_index.php');

    exit();

  } else {
  echo 'Aucun compte ne correspond à cette adresse';
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modification du mot de passe</title>
  </head>
  <body>
    <form class="" action="index.html" method="post">
<label for="mdp">Nouveau mot de passe : </label>
        <input type="text" name="mdp" placeholder="exemple">

<label for="mdp2">Confirmation nouveau mot de passe</label>
        <input type="text" name="mdp2" placeholder="Confirmation">

<input type="submit" name="" value="Valider">
    </form>
  </body>
</html>
