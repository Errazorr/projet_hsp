<?php
//REQUIRES
require('../manager/method.php');
require('../model/mdp_class.php');

$mot_de_passe = new ModifMdp(array($_POST["mail"])); // enregsitrement des données //
$co = new Method(); // nouvelles classe manager //
$co->MotDePasse($mot_de_passe);
?>
