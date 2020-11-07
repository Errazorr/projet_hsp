<?php

require('../manager/method.php');
require('../model/medecin_class.php');

$add_doctor = new Medecin(array('nom'=>$_POST['nom'], 'lieu'=>$_POST['lieu'], 'specialite'=>$_POST['specialite'],
'identifiant'=>$_POST['identifiant'], 'mdp'=>$_POST['mdp'], 'approuve'=>1));
$manager = new Method();
$manager->AddDoctor($add_doctor);

 ?>
