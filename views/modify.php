<?php

try{
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
}
catch (Exception $e){
  die('Erreur:'.$e->getMessage());
}

if (isset($_GET['id']) AND !empty($_GET['id']))  // recup url
{
  $getid = $_GET['id'];
  $select_user_info = $bdd->prepare('SELECT * FROM patient WHERE id = ?');
  $select_user_info->execute(array($getid));
  $whoiam = $select_user_info->fetch();
  if(isset($_POST['ok_modifier_membre'])) {
    $nom_modifie = htmlspecialchars($_POST['nom']);
    $prenom_modifie = htmlspecialchars($_POST['prenom']);
    $modify_info_of_member = $bdd->prepare('UPDATE patient SET prenom = ?, nom = ? WHERE id = ?');
    $modify_info_of_member->execute(array($nom_modifie, $prenom_modifie, $getid));
    header('location:add_patient.php');
  }
} else
{
  echo 'erreur';
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Modifier membre - Administration</title>
   </head>
   <body>

<div align="center">

     <form action="" method="post">
       <label for="nom">Nom : </label>
       <input type="text" name="nom" value="<?= $whoiam['nom']; ?>"><br/><br/>
       <label for="prenom">Prénom : </label>
       <input type="text" name="prenom" value="<?= $whoiam['prenom']; ?>"><br/><br/>
       <input type="submit" name="ok_modifier_membre" value="Modifier">

     </form>
</div>
   </body>
 </html>
