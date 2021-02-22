<?php
try{
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','nathan','oskour');
}
catch (Exception $e){
  die('Erreur:'.$e->getMessage());
}

session_start();

if (isset($_GET['id']) AND !empty($_GET['id']))  // recup url
{
  $getid = $_GET['id'];
  $select_user_info = $bdd->prepare('SELECT * FROM admin WHERE id = ?');
  $select_user_info->execute(array($getid));
  $whoiam = $select_user_info->fetch();
  if(isset($_POST['ok_modifier_compte'])) {
    $nom_modifie = htmlspecialchars($_POST['nom']);
    $prenom_modifie = htmlspecialchars($_POST['prenom']);
    $mail_modifie = htmlspecialchars($_POST['mail']);
    $modify_info_of_member = $bdd->prepare('UPDATE admin SET nom="'.$_POST['nom'].'", prenom="'.$_POST['prenom'].'", mail="'.$_POST['mail'].'"
     WHERE id="'.$_GET['id'].'"');
    $modify_info_of_member->execute(array($nom_modifie => $_SESSION['nom'],
    $prenom_modifie => $_SESSION['prenom'],
    $mail_modifie => $_SESSION['mail'],
    $getid));

      $_SESSION['nom'] = $nom_modifie;
        $_SESSION['prenom'] = $prenom_modifie;
          $_SESSION['mail'] = $mail_modifie;
    header('location:add_admin.php');
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
 		<title style="font-family: Arial, sans-serif">Modifier compte admin</title>
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
 					<p style="font-family: Arial, sans-serif">Modifier votre compte admin : <strong><?= $whoiam['id']; ?></strong> - <strong><?= $whoiam['nom']; ?></strong> - <strong><?= $whoiam['prenom']; ?></strong></p>
 					<label class="form-group">
 						<input type="text" name="nom" class="form-control" value="<?= $whoiam['nom']; ?>" >
 						<span style="font-family: Arial, sans-serif">Nom</span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="text" name="prenom" class="form-control" value="<?= $_SESSION['prenom']; ?>" >
 						<span style="font-family: Arial, sans-serif">Prénom</span>
 						<span class="border"></span>
 					</label>
          <label class="form-group">
 						<input type="mail" name="mail" class="form-control" value="<?= $_SESSION['mail']; ?>" >
 						<span style="font-family: Arial, sans-serif">Mail</span>
 						<span class="border"></span>
 					</label>

 				<center>

        	<button type="submit" name="ok_modifier_compte" style="font-family: Arial, sans-serif">Modifier
</center>
 					</button>
 				</form>
 			</div>
 		</div>

 	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
 </html>
