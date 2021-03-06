<?php
//CONNEXION A LA BDD
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','nathan','oskour');

//SELECTION DES RESERVATIONS DANS LA BDD
$select = $bdd->prepare('SELECT * FROM reservation');

$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();

$newReservations = $select->fetchAll();

//CREATION DE L'EXCEL
$excel = "";
$excel .=  "id\tpatient\tmedecin\tdate\theure\traison\t\n";

//ALIMENTATION DE L'EXCEL AVEC LES DONNEES DE LA TABLE
foreach($newReservations as $row) {
    $excel .= "$row[id]\t$row[nom_patient]\t$row[nom_medecin]\t$row[date_consult]\t$row[time_consult]\t$row[rais_consult]\n";
}

header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=liste_des_rdv.xls");

print $excel;
exit;


?>
