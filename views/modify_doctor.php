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
    $identifiant_modifie = htmlspecialchars($_POST['identifiant']);
    $modify_info_of_member = $bdd->prepare('UPDATE medecin SET nom = ?, lieu = ?, specialite = ?,
       identifiant = ?');
    $modify_info_of_member->execute(array($nom_modifie, $lieu_modifie, $specialite_modifie,
    $identifiant_modifie, $getid));
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
 		<title>Modifier compte médecin</title>
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
 					<h3>Modifier le compte</h3>
 					<p>Modifier le compte suivant : <strong><?= $whoiam['id']; ?></strong> - <strong><?= $whoiam['nom']; ?></strong> - <strong><?= $whoiam['specialite']; ?></strong></p>
 					<label class="form-group">
 						<input type="text" name="nom" class="form-control" value="<?= $whoiam['nom']; ?>" >
 						<span>Nom</span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="text" name="lieu" class="form-control" value="<?= $whoiam['lieu']; ?>" >
 						<span>Lieu</span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="text" name="specialite" class="form-control" value="<?= $whoiam['specialite']; ?>" >
 						<span>Spécialité</span>
 						<span class="border"></span>
 					</label>
 					<label class="form-group">
 						<input type="text" name="identifiant" class="form-control" value="<?= $whoiam['identifiant']; ?>">
 						<span for="">Identifiant</span>
 						<span class="border"></span>
 					</label>

 				<center>

        	<button type="submit" name="ok_modifier_medecin">Modifier
</center>
 					</button>
 				</form>
 			</div>
 		</div>

 	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
 </html>
