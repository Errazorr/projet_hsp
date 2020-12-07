<?php
session_start();
//CONNEXION A LA BDD
try{
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
}
catch (Exception $e){
  die('Erreur:'.$e->getMessage());
}

//Sélection de l'ensemble des informations de la table compte en fonction de l'id //
switch ($_SESSION['role']){
  case "patient":
    $rec = $bdd->prepare('SELECT * FROM patient WHERE id=?');
    $rec->execute(array($_SESSION['id']));
    $donnees= $rec->fetch();
  case "medecin":
    $rec = $bdd->prepare('SELECT * FROM medecin WHERE id=?');
    $rec->execute(array($_SESSION['id']));
    $donnees= $rec->fetch();
  case "admin":
    $rec = $bdd->prepare('SELECT * FROM admin WHERE id=?');
    $rec->execute(array($_SESSION['id']));
    $donnees= $rec->fetch();
  }
?>
