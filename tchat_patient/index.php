<!DOCTYPE html>

<?php
session_start();

try{
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
}
catch (Exception $e){
  die('Erreur:'.$e->getMessage());
}

$req = $bdd->prepare('SELECT nom FROM patient WHERE id=?');
$req->execute(array($_SESSION['id']));
$donnees= $req->fetch();
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title style="font-family: Arial, sans-serif">Notre super chat !</title>
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <header>
    <h1 style="font-family: Arial, sans-serif">Tchat officiel (pour patient) de l'hôpital</h1>
  </header>

  <section class="chat">
    <div class="messages">

    </div>
    <div class="user-inputs">
      <form action="handler.php?task=write" method="POST">
        <input style="font-family: Arial, sans-serif" type="text" name="author" id="author" placeholder="Pseudo ?" disabled="disabled" value="<?= $donnees[0]; ?>">
        <input style="font-family: Arial, sans-serif" type="text" id="content" name="content" placeholder="Veuillez écrire votre message ici !">
        <button type="submit" style="font-family: Arial, sans-serif">🔥 Envoyer !</button>
      </form>
<br><br>
<a href="../index.php" style="text-align: right; " style="font-family: Arial, sans-serif">Retour</a>
    </div>
  </section>
  <script src="js/app.js"></script>
</body>
</html>
