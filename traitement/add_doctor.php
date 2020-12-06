<?php
//REQUIRES
require('../manager/method.php');
require('../model/medecin_class.php');

//CLASSE MEDECIN
$add_doctor = new Medecin(array('nom'=>$_POST['nom'], 'lieu'=>$_POST['lieu'], 'specialite'=>$_POST['specialite'],
'mail'=>$_POST['mail'], 'mdp'=>$_POST['mdp'], 'approuve'=>'oui', 'image'=>$_POST['image']));

//APPEL DE LA METHODE ADDDOCTOR
$manager = new Method();
$manager->AddDoctor($add_doctor);

 ?>
