<?php
//CONNEXION A LA BDD
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');

//SELECTION DES RESERVATIONS DANS LA BDD
$select = $bdd->prepare('SELECT * FROM patient');

$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();

$newReservations = $select->fetchAll();

//CREATION DE L'EXCEL
$excel = "";
$excel .=  "id\tnom\tprenom\tdatenaissance\tmail\tadresse\tmutuelle\tnumsecsoc\toption\tregime\t\n";

//ALIMENTATION DE L'EXCEL AVEC LES DONNEES DE LA TABLE
foreach($newReservations as $row) {
    $excel .= "$row[id]\t$row[nom]\t$row[prenom]\t$row[date_naissance]\t$row[mail]\t$row[adresse]\t$row[mutuelle]\t$row[num_sec_soc]\t$row[option_chambre]\t$row[regime]\n";
}
<<<<<<< HEAD

header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=liste_des_patients.xls");

print $excel;
exit;


=======
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->output('demo.pdf','I');
//D
//I
//F
//S
>>>>>>> d046ab665fb1b3f9c8dcefee03f487a942480f89
?>
