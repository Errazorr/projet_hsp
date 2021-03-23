<?php

// CONNEXION BDD
try{
      $db= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','nathan','oskour');
      return $db;
    }
catch (Exception $e){
      die('Erreur:'.$e->getMessage());
}


 ?>
