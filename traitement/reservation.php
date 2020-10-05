<?php

require('../manager/method.php');
require('../model/prise_rdv.php');

$rdv = new RDV($_POST['nom'], $_POST['prenom'], $_POST['medecin'], $_POST['rais_consult'], $_POST['date_consult']);

$prise_rdv = new Method();
$prise_rdv->Reservation($rdv);
var_dump($rdv);

 ?>
