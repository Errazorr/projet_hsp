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
  $select_user_info = $bdd->prepare('SELECT * FROM patient WHERE id = ?');
  $select_user_info->execute(array($getid));
  $whoiam = $select_user_info->fetch();
  if(isset($_POST['ok_modifier_membre'])) {
    $nom_modifie = htmlspecialchars($_POST['nom']);
    $prenom_modifie = htmlspecialchars($_POST['prenom']);
    $date_naissance_modifie = htmlspecialchars($_POST['date_naissance']);
    $mail_modifie = htmlspecialchars($_POST['mail']);
    $adresse_modifie = htmlspecialchars($_POST['adresse']);
    $mutuelle_modifie = htmlspecialchars($_POST['mutuelle']);
    $num_sec_soc_modifie = htmlspecialchars($_POST['num_sec_soc']);
    $option_chambre_modifie = htmlspecialchars($_POST['option_chambre']);
    $regime_modifie = htmlspecialchars($_POST['regime']);
    $modify_info_of_member = $bdd->prepare('UPDATE patient SET prenom = ?, nom = ?, date_naissance = ?, mail = ?
      , adresse = ?, mutuelle = ?, num_sec_soc = ?, option_chambre = ?, regime = ? WHERE id = ?');
    $modify_info_of_member->execute(array($nom_modifie, $prenom_modifie, $date_naissance_modifie, $mail_modifie,
    $adresse_modifie, $mutuelle_modifie, $num_sec_soc_modifie, $option_chambre_modifie, $regime_modifie, $getid));
    header('location:add_patient.php');
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
 		<title>RegistrationForm_v7 by Colorlib</title>
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
 					<p>Modifier le compte suivant : <?= $whoiam['nom']; ?>  <?= $whoiam['prenom']; ?></p>
 					<label class="form-group">
 						<input type="text" name="nom" class="form-control" value="<?= $whoiam['nom']; ?>" >
 						<span>Nom</span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="text" name="prenom" class="form-control" value="<?= $whoiam['prenom']; ?>" >
 						<span>Prénom</span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="date" name="date_naissance" class="form-control" value="<?= $whoiam['date_naissance']; ?>" >
 						<span>Date de naissance</span>
 						<span class="border"></span>
 					</label>
 					<label class="form-group">
 						<input type="text" name="mail" class="form-control" value="<?= $whoiam['mail']; ?>">
 						<span for="">Adresse mail</span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="text" name="adresse" class="form-control" value="<?= $whoiam['adresse']; ?>" >
 						<span>Adresse</span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="text" name="mutuelle" class="form-control" value="<?= $whoiam['mutuelle']; ?>" >
 						<span>Mutuelle</span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="text" name="num_sec_soc" class="form-control"  maxlength="15" name="num_sec_soc" value="<?= $whoiam['num_sec_soc']; ?>" >
 						<span>Numéro de sécurité sociale</span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="text" name="option_chambre" class="form-control" value="<?= $whoiam['option_chambre']; ?>" >
 						<span>Option de chambre</span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="text" name="regime" class="form-control" value="<?= $whoiam['regime']; ?>" >
 						<span>Régime</span>
 						<span class="border"></span>
 					</label>
 				<center>

        	<button type="submit" class="zmdi zmdi-arrow-right" name="ok_modifier_membre">Modifier
</center>
 					</button>
 				</form>
 			</div>
 		</div>

 	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
 </html>
