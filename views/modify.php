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
    $date_naissance_modifie = htmlspecialchars($_POST['date_naissance']);
    $mail_modifie = htmlspecialchars($_POST['mail']);
    $adresse_modifie = htmlspecialchars($_POST['adresse']);
    $mutuelle_modifie = htmlspecialchars($_POST['mutuelle']);
    $num_sec_soc_modifie = htmlspecialchars($_POST['num_sec_soc']);
    $option_chambre_modifie = htmlspecialchars($_POST['option_chambre']);
    $regime_modifie = htmlspecialchars($_POST['regime']);
    $modify_info_of_member = $bdd->prepare('UPDATE patient SET prenom = ?, nom = ?, date_naissance = ?, mail = ?
      , adresse = ?, mutuelle = ?, num_sec_soc = ?, option_chambre = ?, regime = ? WHERE id = ?');
    $modify_info_of_member->execute(array($nom_modifie, $prenom_modifie, $date_naissance_modifie, $mail_modifie,
    $adresse_modifie, $mutuelle_modifie, $num_sec_soc_modifie, $option_chambre_modifie, $regime_modifie, $getid));
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
       <label for="date_naissance">Date de naissance : </label>
       <input type="date" name="date_naissance" value="<?= $whoiam['date_naissance']; ?>"><br/><br/>
       <label for="mail">Mail : </label>
       <input type="email" name="mail" value="<?= $whoiam['mail']; ?>"><br/><br/>
       <label for="adresse">Adresse : </label>
       <input type="text" name="adresse" value="<?= $whoiam['adresse']; ?>"><br/><br/>
       <label for="mutuelle">Mutuelle : </label>
       <input type="text" name="mutuelle" value="<?= $whoiam['mutuelle']; ?>"><br/><br/>
       <label for="num_sec_soc">Num Sec Soc : </label>
       <input type="tel" maxlength="15" name="num_sec_soc" value="<?= $whoiam['num_sec_soc']; ?>"><br/><br/>
       <label for="option_chambre">Option : </label>
       <input type="text" name="option_chambre" value="<?= $whoiam['option_chambre']; ?>"><br/><br/>
       <label for="regime">Regime : </label>
       <input type="text" name="regime" value="<?= $whoiam['regime']; ?>"><br/><br/>

       <input type="submit" name="ok_modifier_membre" value="Modifier">

     </form>
</div>
   </body>
 </html>
