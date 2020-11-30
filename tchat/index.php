<!DOCTYPE html>

<?php
session_start();

try{
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
}
catch (Exception $e){
  die('Erreur:'.$e->getMessage());
}

$req = $bdd->prepare('SELECT nom FROM medecin WHERE id=?');
$req->execute(array($_SESSION['id']));
$donnees= $req->fetch();
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notre super chat !</title>
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <header>
    <h1>Tchat officiel de l'hôpital</h1>
  </header>

  <section class="chat">
    <div class="messages">

    </div>
    <div class="user-inputs">
      <form action="handler.php?task=write" method="POST">
        <input type="text" name="author" id="author" placeholder="Pseudo ?" disabled="disabled" value="<?= $donnees[0]; ?>">
        <input type="text" id="content" name="content" placeholder="Veuillez écrire votre message ici !">
        <button type="submit">🔥 Envoyer !</button>
      </form>
<br><br>
<a href="../page_index.php" style="text-align: right; ">Retour</a>
    </div>
  </section>
  <script src="js/app.js"></script>
</body>
</html>
