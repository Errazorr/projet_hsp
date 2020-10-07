<?php

require('../manager/method.php');
require('../model/user_class.php');

$bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');

if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date_naissance']) AND !empty($_POST['mail']) AND !empty($_POST['adresse']) AND !empty($_POST['mutuelle']) AND !empty($_POST['num_sec_soc'])
AND !empty($_POST['option_chambre']) AND !empty($_POST['regime']) AND !empty($_POST['mdp'])) {
$inscription = new User(array('nom'=>$_POST['nom'], 'prenom'=>$_POST['prenom'], 'dateNaissance'=>$_POST['date_naissance'], 'mail'=>$_POST['mail'], 'adresse'=>$_POST['adresse'], 'mutuelle'=>$_POST['mutuelle'], 'numSecSoc'=>$_POST['num_sec_soc'],
'optionChambre'=>$_POST['option_chambre'], 'regime'=>$_POST['regime'], 'mdp'=>$_POST['mdp'], 'role'=>'patient'));
$manager = new Method();
$manager->Inscription($inscription);
} else {
  echo '<body onLoad="alert(\'Veuillez remplir toutes les informations\')">';

  echo '<meta http-equiv="refresh" content="0;URL=../views/inscription.html">';
}
 ?>
