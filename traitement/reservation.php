<?php
//REQUIRES
require('../manager/method.php');
require('../model/prise_rdv.php');

//CLASSE RDV AVEC LES DONNEES DE LA PRISE DE RDV
$rdv = new RDV($_POST['medecin'], $_POST['date_consult'], $_POST['time_consult'], $_POST['rais_consult']);

//APPEL DE LA METHODE RESERVATION
$prise_rdv = new Method();
$prise_rdv->Reservation($rdv);

 ?>
