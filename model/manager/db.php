<?php


try{
      $db= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
      return $db;
    }
catch (Exception $e){
      die('Erreur:'.$e->getMessage());
}


 ?>
