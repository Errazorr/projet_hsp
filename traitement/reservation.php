<?php

require('../manager/method.php');
require('../model/inscription_class.php');

$rdv = new inscription($_POST['nom'], $_POST['prenom'], $_POST['date_naissance'], $_POST['mail'], $_POST['adresse'], $_POST['mutuelle'], $_POST['num_sec_soc'], $_POST['option_chambre'], $_POST['regime'], $_POST['mdp'], 'patient');

$manager = new Method();
$manager->Inscription($rdv);
var_dump($rdv);

 ?>
