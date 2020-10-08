<?php

require('../manager/method.php');
require('../model/user_class.php');


if (is_string($_POST['nom']) && strlen($_POST['nom']) <= 30) {

$inscription = new User(array('nom'=>$_POST['nom'], 'prenom'=>$_POST['prenom'], 'dateNaissance'=>$_POST['date_naissance'], 'mail'=>$_POST['mail'], 'adresse'=>$_POST['adresse'], 'mutuelle'=>$_POST['mutuelle'], 'numSecSoc'=>$_POST['num_sec_soc'],
'optionChambre'=>$_POST['option_chambre'], 'regime'=>$_POST['regime'], 'mdp'=>$_POST['mdp'], 'role'=>'patient'));
$manager = new Method();
$manager->Inscription($inscription);
}
else {
  echo '<body onLoad="alert(\'Votre nom est trop long ! \')">';

  echo '<meta http-equiv="refresh" content="0;URL=../views/inscription.html">';
}
 ?>
