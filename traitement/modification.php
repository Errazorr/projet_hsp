<?php
//REQUIRES
require('../manager/method.php');
require('../model/modification_class.php');

//CLASSE MODIFICATION
$modif = new Modification($_POST['nom'], $_POST['prenom'], $_POST['date_naissance'], $_POST['mail'], $_POST['adresse'], $_POST['mutuelle'], $_POST['num_sec_soc'], $_POST['option_chambre'], $_POST['regime']);

//APPEL DE LA METHODE MODIFICATION
$manager = new Method();
$manager->Modification($modif);

 ?>
