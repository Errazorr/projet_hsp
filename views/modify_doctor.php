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
  $select_user_info = $bdd->prepare('SELECT * FROM medecin WHERE id = ?');
  $select_user_info->execute(array($getid));
  $whoiam = $select_user_info->fetch();
  if(isset($_POST['ok_modifier_medecin'])) {
    $nom_modifie = htmlspecialchars($_POST['nom']);
    $lieu_modifie = htmlspecialchars($_POST['lieu']);
    $specialite_modifie = htmlspecialchars($_POST['specialite']);
    $mail_modifie = htmlspecialchars($_POST['mail']);
    $modify_info_of_member = $bdd->prepare('UPDATE medecin SET nom = ?, lieu = ?, specialite = ?,
       mail = ? WHERE id = ?');
    $modify_info_of_member->execute(array($nom_modifie, $lieu_modifie, $specialite_modifie,
    $mail_modifie, $getid));
    header('location:add_doctor.php');
  }
} else
{
  echo 'erreur';
}
 ?>



     <!DOCTYPE html>
 <html>
 	<head>
 		<meta charset="utf-8">
 		<title style="font-family: Arial, sans-serif">Modifier compte médecin</title>
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
 					<h3 style="font-family: Arial, sans-serif">Modifier le compte</h3>
 					<p style="font-family: Arial, sans-serif">Modifier le compte suivant : <strong><?= $whoiam['id']; ?></strong> - <strong><?= $whoiam['nom']; ?></strong> - <strong><?= $whoiam['specialite']; ?></strong></p>
 					<label class="form-group">
 						<input type="text" name="nom" class="form-control" value="<?= $whoiam['nom']; ?>" >
 						<span style="font-family: Arial, sans-serif">Nom</span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="text" name="lieu" class="form-control" value="<?= $whoiam['lieu']; ?>" >
 						<span style="font-family: Arial, sans-serif">Lieu</span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="text" name="specialite" class="form-control" value="<?= $whoiam['specialite']; ?>" >
 						<span style="font-family: Arial, sans-serif">Spécialité</span>
 						<span class="border"></span>
 					</label>
 					<label class="form-group">
 						<input type="text" name="mail" class="form-control" value="<?= $whoiam['mail']; ?>">
 						<span for="" style="font-family: Arial, sans-serif">Mail</span>
 						<span class="border"></span>
 					</label>

 				<center>

        	<button type="submit" name="ok_modifier_medecin" style="font-family: Arial, sans-serif">Modifier
</center>
 					</button>
 				</form>
 			</div>
 		</div>

 	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
 </html>
