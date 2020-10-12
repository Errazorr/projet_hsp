<?php

require('../manager/method.php');
require('../model/user_class.php');

$mot_de_passe = new User(array($_POST["mail"])); // enregsitrement des données //
$co = new Method(); // nouvelles classe manager //
$co->MotDePasse($mot_de_passe);
?>
