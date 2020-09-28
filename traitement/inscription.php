<?php

require('../manager/manager.php');
require('../model/inscription_class.php');

$inscription = new inscription($_POST['nom'], $_POST['prenom'], $_POST['date_naissance'], $_POST['mail'], $_POST['adresse'], $_POST['mutuelle'], $_POST['num_sec_soc'], $_POST['option_chambre'], $_POST['regime'], $_POST['mdp'], 'patient');

$manager = new Manager();
$manager->Inscription($inscription);
var_dump($inscription);

 ?>
