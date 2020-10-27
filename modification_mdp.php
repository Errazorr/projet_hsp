<?php

if(!empty($_POST) && !empty($_POST['mail'])) {

  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root',''); // Connexion à la bdd

  $req = $bdd->prepare('SELECT * FROM compte WHERE mail = ?');

  $req->execute([$_POST['mail']]);

  $user = $req->fetch();

  if ($user) {
    session_start();

    $bdd->prepare('UPDATE compte SET mdp = ? WHERE id = ?');->execute([$user->id]);

    $_SESSION['mail'] = 'Envoyé par mail';

    header('page_index.php');

    exit();

  } else {
    $_SESSION['mail'] = 'Aucun compte ne correspond à cette adresse';
  }
}

?>
