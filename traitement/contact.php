<?php
//REQUIRES
require('../manager/method.php');
require('../model/contact_class.php');

//CLASSE USER
$contact = new Contact(array('nom'=>$_POST['nom'], 'mail'=>$_POST['mail'], 'message'=>$_POST['message'],
'sujet'=>$_POST['sujet']));
//APPEL DE LA METHODE INSCRIPTION
$manager = new Method();
$manager->ContactUs($contact);

 ?>
