<?php
$bdd = new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
if(isset($_GET['type']) AND $_GET['type'] == 'membre') {
 if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
    $confirme = (int) $_GET['confirme'];
    $req = $bdd->prepare('UPDATE patient SET confirme = 1 WHERE id = ?');
    $req->execute(array($confirme));
 }
 if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
    $supprime = (int) $_GET['supprime'];
    $req = $bdd->prepare('DELETE FROM patient WHERE id = ?');
    $req->execute(array($supprime));
 }
 if(isset($_GET['desaprouve']) AND !empty($_GET['desaprouve'])) {
    $confirme = (int) $_GET['desaprouve'];
    $req = $bdd->prepare('UPDATE patient SET confirme = 0 WHERE id = ?');
    $req->execute(array($confirme));
 }
} elseif(isset($_GET['type']) AND $_GET['type'] == 'commentaire') {
 if(isset($_GET['approuve']) AND !empty($_GET['approuve'])) {
    $approuve = (int) $_GET['approuve'];
    $req = $bdd->prepare('UPDATE medecin SET approuve = 1 WHERE id = ?');
    $req->execute(array($approuve));
 }
 if(isset($_GET['desaprouvemed']) AND !empty($_GET['desaprouvemed'])) {
    $approuve = (int) $_GET['desaprouvemed'];
    $req = $bdd->prepare('UPDATE medecin SET approuve = 0 WHERE id = ?');
    $req->execute(array($approuve));
 }
 if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
    $supprime = (int) $_GET['supprime'];
    $req = $bdd->prepare('DELETE FROM medecin WHERE id = ?');
    $req->execute(array($supprime));
 }
}
$membres = $bdd->query('SELECT * FROM patient ORDER BY id DESC');
$commentaires = $bdd->query('SELECT * FROM medecin ORDER BY id DESC');
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8" />
 <title>Activation des comptes</title>
 <link rel="icon" href="../img/logo3icon.png">
 <title>Administration</title>
</head>
<body>

</body>
</html>

     <!DOCTYPE html>
 <html>
 	<head>
 		<meta charset="utf-8">

 		<meta name="viewport" content="width=device-width, initial-scale=1.0">

 		<!-- MATERIAL DESIGN ICONIC FONT -->
 		<link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

 		<!-- STYLE CSS -->
 		<link rel="stylesheet" href="../css/style3.css">
 	</head>

 	<body>

 		<div class="wrapper">
 			<div class="inner">
 				<form action="" method="post">
 					<h3>Confirmation des comptes</h3>
          <br><br>

          <ul>
             <?php while($m = $membres->fetch()) { ?>
             <li><?= $m['id'] ?> : <?= $m['nom'] ?> - <?= $m['prenom'] ?> - Confirme : <strong><?= $m['confirme'] ?></strong> :<?php if($m['confirme'] == 0) { ?>
               - <a href="activate.php?type=membre&confirme=<?= $m['id'] ?>" style="text-decoration: none; color: #3ED400;">Confirmer</a><?php } ?> - <a href="activate.php?type=membre&supprime=<?= $m['id'] ?>" style="text-decoration: none; color: #b30000;">Supprimer</a>
               <?php if($m['confirme'] == 1) { ?>
                 - <a href="activate.php?type=membre&desaprouve=<?= $m['id'] ?>" style="text-decoration: none; color: #FFA500;">Désapprouver</a><?php } ?>
             </li>
             <?php } ?>
          </ul>
          <br /><br />
          <ul>
             <?php while($c = $commentaires->fetch()) { ?>
             <li><?= $c['id'] ?> : <?= $c['nom'] ?> : <?= $c['specialite'] ?> - Confirme : <strong><?= $c['approuve'] ?></strong> :<?php if($c['approuve'] == 0) { ?> - <a href="activate.php?type=commentaire&approuve=<?= $c['id'] ?>" style="text-decoration: none; color: #3ED400;">Approuver</a><?php } ?> -
               <a href="activate.php?type=commentaire&supprime=<?= $c['id'] ?>" style="text-decoration: none; color: #b30000;">Supprimer</a>
<?php if($c['approuve'] == 1) { ?> - <a href="activate.php?type=commentaire&desaprouvemed=<?= $c['id'] ?>" style="text-decoration: none; color: #FFA500;">Désapprouver</a><?php } ?>
             </li>
             <?php } ?>
          </ul>
          <br><br>
          <center>
                  <a href="../page_index.php" >Retour<span
                      ></span></a>
 				</form>

 			</div>
 		</div>

 	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
 </html>
