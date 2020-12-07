
     <!DOCTYPE html>
 <html>
 	<head>
 		<meta charset="utf-8">
 		<title>Nous contacter</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1.0">

 		<!-- MATERIAL DESIGN ICONIC FONT -->
 		<link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

 		<!-- STYLE CSS -->
 		<link rel="stylesheet" href="../css/style3.css">
 	</head>

 	<body>
<?php session_start();
if(isset($_SESSION['id'])) {
  try{
    $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
  }
  catch (Exception $e){
    die('Erreur:'.$e->getMessage());
  }
  $req = $bdd->prepare('SELECT nom, mail FROM patient WHERE id=?');
  $req->execute(array($_SESSION['id']));
  $donnees= $req->fetch();

?>

 		<div class="wrapper">
 			<div class="inner">
 				<form action="../traitement/contact.php" method="post">
 					<h3>Nous contacter</h3>
 					<p>Contactez-nous ! </p>
 					<label class="form-group">
 						<input type="text" name="nom" class="form-control"  value="<?= $donnees[0]; ?>"readonly ="readonly" >
 						<span></span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="mail" name="mail" class="form-control"  value="<?= $donnees[1]; ?> "readonly = "readonly">
 						<span></span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="text" name="message" class="form-control"  >
 						<span>Message</span>
 						<span class="border"></span>
 					</label>
 					<label class="form-group">
 						<input type="text" name="sujet" class="form-control">
 						<span for="">Sujet</span>
 						<span class="border"></span>
 					</label>

 				<center>

        	<button type="submit" name="envoyer">Envoyer
</center>
 					</button>
 				</form>
      <center>
<br><br>
        <a href="../index.php" >Retour<span
            ></span> </center>
        <?php } else { ?>
          <div class="wrapper">
       			<div class="inner">
       				<form action="../traitement/contact.php" method="post">
       					<h3>Nous contacter</h3>
       					<p>Contactez-nous ! </p>
       					<label class="form-group">
       						<input type="text" name="nom" class="form-control" >
       						<span>Nom</span>
       						<span class="border"></span>
       					</label>
                <label class="form-group">
       						<input type="mail" name="mail" class="form-control" >
       						<span>Mail </span>
       						<span class="border"></span>
       					</label>
                <label class="form-group">
       						<input type="text" name="message" class="form-control"  >
       						<span>Message</span>
       						<span class="border"></span>
       					</label>
       					<label class="form-group">
       						<input type="text" name="sujet" class="form-control">
       						<span for="">Sujet</span>
       						<span class="border"></span>
       					</label>

       				<center>

              	<button type="submit" name="envoyer">Envoyer
      </center>
       					</button>

                <center><br><br><br>
                        <a href="../index.php" >Retour<span
                            ></span></a>
       				</form>
            <?php } ?>
 			</div>
 		</div>

 	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
 </html>
