<?php

require('../manager/method.php');
require('../model/inscription_class.php');

$modif = new Modification($_POST['nom'], $_POST['prenom'], $_POST['date_naissance'], $_POST['mail'], $_POST['adresse'], $_POST['mutuelle'], $_POST['num_sec_soc'], $_POST['option_chambre'], $_POST['regime']);

$manager = new Method();
$manager->Modification($modif);

 ?>
