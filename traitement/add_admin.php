<?php
//REQUIRES
require('../manager/method.php');
require('../model/admin_class.php');

//CLASSE ADMIN
$add_admin = new Admin(array('nom'=>$_POST['nom'], 'prenom'=>$_POST['prenom'], 'mail'=>$_POST['mail'],
'mdp'=>$_POST['mdp'], 'role'=>'admin'));
//APPEL DE LA METHODE ADDADMIN
$manager = new Method();
$manager->AddAdmin($add_admin);

 ?>
