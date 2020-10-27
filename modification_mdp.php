<?php
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
session_start();

if(isset($_POST['mail'])) {
  if($_POST['mdp'] == $_POST['mdp2']) {
$reponse=$bdd->prepare('SELECT * FROM compte WHERE mail = ? ');

$reponse->execute(array(
  $_POST['mail']
));

$donnee=$reponse->fetch();

if ($donnee)
{
$reponseCompte=$bdd->prepare('UPDATE compte SET mdp = ? WHERE mail = ? ');

$reponseCompte->execute(array(
                  md5($_POST['mdp']),
                  $_POST['mail']));

header("location: views/connexion.php");

$reponseCompte->closeCursor();

if($reponseCompte) {
  echo 'Votre mot de passe a été changé';
}

}
}
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modification du mot de passe</title>
  </head>
  <body>
<div align="center">
  <h1> Récupérez votre mot de passe </h1>
    <form class="" action="" method="post">
      <table border="0" cellpadding="5" cellspacing="15">
        <tr>
<td> <label for="mail">Votre adresse mail :</label> </td>
<td>   <input type="mail" name="mail" placeholder="exemple@exemple.fr" /> </td>
      </tr>
<br><br>
<tr>
<td> <label for="mdp">Nouveau mot de passe :</label> </td>
<td>   <input type="password" name="mdp" placeholder="motdepasse" /> </td>
</tr>
<br><br>
<tr>
<td> <label for="mdp2">Confirmation mot de passe :</label> </td>
<td>   <input type="password" name="mdp2" placeholder="confirmation" /> </td>
</tr>
<br><br>
<tr>
<td align="center" colspan="2">
<input type="submit" name="valider_email" value="Valider">
</td>
    </form>
  </body>
</html>
