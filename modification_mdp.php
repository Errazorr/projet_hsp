<?php
//CONNEXION A LA BDD
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
session_start();

//SI IL Y A UN MAIL
if(isset($_POST['mail'])) {
  //SI LE MOT DE PASSE ET LA CONFIRMATION SONT LES MÊMES
  if($_POST['mdp'] == $_POST['mdp2']) {
    //REQUETE SQL
    $reponse=$bdd->prepare('SELECT * FROM compte WHERE mail = ? ');

    $reponse->execute(array( $_POST['mail'] ));

    $donnee=$reponse->fetch();

    //SIL IL TROUVE QUELQUE CHOSE DANS LA BDD
    if ($donnee){
      //UPDATE LE MDP
      $reponseCompte=$bdd->prepare('UPDATE compte SET mdp = ? WHERE mail = ? ');

      $reponseCompte->execute(array( md5($_POST['mdp']),
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
    <title style="font-family: Arial, sans-serif">Modification du mot de passe</title>
  </head>
  <body>
    <div align="center">
      <h1 style="font-family: Arial, sans-serif"> Récupérez votre mot de passe </h1>
      <form class="" action="" method="post">
      <table border="0" cellpadding="5" cellspacing="15">
        <tr>
          <td> <label for="mail" style="font-family: Arial, sans-serif">Votre adresse mail :</label> </td>
          <td> <input type="mail" name="mail" placeholder="exemple@exemple.fr"  style="font-family: Arial, sans-serif"/> </td>
      </tr>
      <br><br>
      <tr>
        <td> <label for="mdp" style="font-family: Arial, sans-serif">Nouveau mot de passe :</label> </td>
        <td>   <input type="password" name="mdp" placeholder="motdepasse"  style="font-family: Arial, sans-serif"/> </td>
      </tr>
      <br><br>
      <tr>
        <td> <label for="mdp2" style="font-family: Arial, sans-serif">Confirmation mot de passe :</label> </td>
        <td>   <input type="password" name="mdp2" placeholder="confirmation" style="font-family: Arial, sans-serif" /> </td>
      </tr>
      <br><br>
      <tr>
        <td align="center" colspan="2">
          <input type="submit" name="valider_email" value="Valider" style="font-family: Arial, sans-serif">
        </td>
    </form>
  </body>
</html>
