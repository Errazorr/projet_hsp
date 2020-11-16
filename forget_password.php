<?php
include 'manager/db.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site web</title>
  </head>
  <body>
    <h2>Mot de passe oublié ?</h2>
    <form method="post">
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>
        <button type="submit">Envoyer un code</button>
      </div>
    </form>
  </body>
</html>

<?php

if(isset($_POST['email']))
{
  $token = uniqid();
  $url = "http://localhost/projet_hsp/projet_hsp/token?token=$token";

  $message = "Bonjour, voici votre lien pour la réinitialisation : $url";
  $headers = 'Content-Type: text/plain; charset="utf-8"'." ";

  if(mail($_POST['email'], 'Mot de passe oublié', $message, $headers))
  {
    $sql = "UPDATE patient SET token = ? WHERE mail = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$token, $_POST['email']]);
    echo 'Mail envoyé!';
  }
  else {
    echo "Une erreur est survenue...";
  }
}

?>
