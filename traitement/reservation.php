<?php

require('../manager/method.php');
require('../model/prise_rdv.php');

$rdv = new RDV($_POST['medecin'], $_POST['date_consult'], $_POST['time_consult'], $_POST['rais_consult']);

$prise_rdv = new Method();
$prise_rdv->Reservation($rdv);

 ?>
