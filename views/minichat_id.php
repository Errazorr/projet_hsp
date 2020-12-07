
<?php
try{
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
}
catch (Exception $e){
  die('Erreur:'.$e->getMessage());
}

session_start();

 $select_all_members = $bdd->query('SELECT * FROM patient WHERE id ="'.$_SESSION['id'].'"');
if($select_all_members->rowCount() > 0)
{
  while($m = $select_all_members->fetch()){
  }}

$token = uniqid();

 ?>

     <!DOCTYPE html>
 <html>
 	<head>
 		<meta charset="utf-8">
 		<title>Accès - tchat</title>
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
 					<h3>Accéder au tchat</h3><br>
 					<p>Rebonjour <strong><?= $_SESSION['prenom']; ?></strong>, désirez-vous accéder au tchat ? </p>
          	<p>Vous y serez enregistré sous le nom : <strong><?= $_SESSION['nom']; ?></strong></p>


 				<center>

        <a href="minichat.php?nom=<?= $_SESSION['nom']; ?>?token=<?php echo $token ?>" >	<button type="button" name="ok_modifier_compte">C'est parti
</center>
 					</button>
 				</form>
        <br><br>
            <center>
            <a href="../index.php" >Retour<span
                    ></span> </center>
 			</div>
 		</div>

 	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
 </html>
