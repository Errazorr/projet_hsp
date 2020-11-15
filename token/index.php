<?php

include '../manager/db.php';

if(isset($_GET['token']) && $_GET['token'] != '')
{
  $stmt = $db->prepare('SELECT mail FROM patient WHERE token = ?');
  $stmt->execute([$_GET['token']]);
  $email = $stmt->fetchColumn();

  if($email)
  {
    ?>

    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Récupération mot de passe</title>
      </head>
      <body>
        <form method="post">
          <label for="newPassword">Nouveau mot de passe : </label>
          <input type="password" name="newPassword">
          <input type="submit" name="Confirmer">
        </form>
      </body>
    </html>

    <?php
  }
}

if(isset($_POST['newPassword']))
{
  $hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
  $sql = "UPDATE patient SET mdp = ?, token = NULL WHERE mail = ?";
  $stmt = $db->prepare($sql);
  $stmt->execute([$hashedPassword, $email]);
  echo "Mot de passe modifié avec succès !";
}
 ?>
