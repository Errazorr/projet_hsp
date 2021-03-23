<?php

session_start();

if($_SESSION['role'] == 'admin') //ON VERIFIE SI LA SESSION ACTUELLE EST BIEN CELLE DE L'ADMIN
{

include '../manager/db.php';
// ENVOIE DE MAIL
if($_SESSION['id'] == $_GET['id'])
{
  $stmt = $db->prepare('SELECT id FROM admin WHERE id = ?');
  $stmt->execute([$_GET['id']]);
  $email = $stmt->fetchColumn();

  if($email)
  {

    ?>





      <!DOCTYPE html>
  <html>
  	<head>
  		<meta charset="utf-8">
  		<title>Changement mot de passe</title>
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">

  		<!-- MATERIAL DESIGN ICONIC FONT -->
  		<link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
          <link rel="stylesheet" href="css/style4.css">
  		<!-- STYLE CSS -->
  		<link rel="stylesheet" href="../css/style3.css">
  	</head>

  	<body>

  		<div class="wrapper">
  			<div class="inner">
  				<form method="post">
  					<h3>Nouveau mot de passe</h3>
  					<p>Validez votre nouveau mot de passe en fonction de votre compte.</p>


            <label class="form-group">
              <input type="password" id="myInput" name="newPassword" class="form-control" value="" required>
              <span for="">Mot de passe</span>
              <span class="border"></span>
<br>


            </label>

            <label class="form-group">
              <input type="password" id="myInpute" name="newPassword_confirme" class="form-control" value="" required>
              <span for="">Mot de passe</span>
              <span class="border"></span>


            </label>

            <input type="checkbox" onclick="myFunction()">Afficher le mot de passe
                      <!--SCRIPT POUR AFFICHER LE MDP-->
                      <script>
                      function myFunction() {
                      var x = document.getElementById("myInput");
                      if (x.type === "password") {
                      x.type = "text";
                      } else {
                      x.type = "password";
                      }
                      var x = document.getElementById("myInpute");
                      if (x.type === "password") {
                      x.type = "text";
                      } else {
                      x.type = "password";
                      }
                      }
                      </script>


  				<center>

         	<button type="submit" name="Confirmer">Valider
 </center>
  					</button><br><br>

            <?php


          //MODIFICATION DU MDP
          if(isset($_POST['newPassword']) AND isset($_POST['newPassword_confirme']))
          {
            if($_POST['newPassword'] == $_POST['newPassword_confirme'])
            {
            $hashedPassword = md5($_POST['newPassword_confirme']);
            $sql = "UPDATE admin SET mdp = ? WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$hashedPassword, $email]);
            header ('location:../index.php?stmt=good');
          }
          else
          {
             echo 'Mots de passes incorrectes.';
          }
   }




         ?>

  				</form>
  			</div>
  		</div>

<?php }
}
else { echo 'Erreur, vous ne pouvez pas changer le mot de passe des autres utilisateurs !';}
 ?>
  	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
  </html>

<?php }

if($_SESSION['role'] == 'patient')
{

include '../manager/db.php';

if($_SESSION['id'] == $_GET['id'])
{
  $stmt = $db->prepare('SELECT id FROM patient WHERE id = ?');
  $stmt->execute([$_GET['id']]);
  $email = $stmt->fetchColumn();

  if($email)
  {

    ?>





      <!DOCTYPE html>
  <html>
  	<head>
  		<meta charset="utf-8">
  		<title>Changement mot de passe</title>
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">

  		<!-- MATERIAL DESIGN ICONIC FONT -->
  		<link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
          <link rel="stylesheet" href="css/style4.css">
  		<!-- STYLE CSS -->
  		<link rel="stylesheet" href="../css/style3.css">
  	</head>

  	<body>

  		<div class="wrapper">
  			<div class="inner">
  				<form method="post">
  					<h3>Nouveau mot de passe</h3>
  					<p>Validez votre nouveau mot de passe en fonction de votre compte.</p>


            <label class="form-group">
              <input type="password" id="myInput" name="newPassword" class="form-control" value="" required>
              <span for="">Mot de passe</span>
              <span class="border"></span>
<br>


            </label>

            <label class="form-group">
              <input type="password" id="myInpute" name="newPassword_confirme" class="form-control" value="" required>
              <span for="">Mot de passe</span>
              <span class="border"></span>


            </label>

            <input type="checkbox" onclick="myFunction()">Afficher le mot de passe
                      <script>
                      function myFunction() {
                      var x = document.getElementById("myInput");
                      if (x.type === "password") {
                      x.type = "text";
                      } else {
                      x.type = "password";
                      }
                      var x = document.getElementById("myInpute");
                      if (x.type === "password") {
                      x.type = "text";
                      } else {
                      x.type = "password";
                      }
                      }
                      </script>


  				<center>

         	<button type="submit" name="Confirmer">Valider
 </center>
  					</button><br><br>

            <?php



          if(isset($_POST['newPassword']) AND isset($_POST['newPassword_confirme']))
          {
            if($_POST['newPassword'] == $_POST['newPassword_confirme'])
            {
            $hashedPassword = md5($_POST['newPassword_confirme']);
            $sql = "UPDATE patient SET mdp = ? WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$hashedPassword, $email]);
            header ('location:../index.php?stmt=good');
          }
          else
          {
             echo 'Mots de passes incorrectes.';
          }
   }




         ?>

  				</form>
  			</div>
  		</div>

<?php }
}
else { echo 'Erreur, vous ne pouvez pas changer le mot de passe des autres utilisateurs !';}
 ?>
  	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
  </html>

<?php }

if($_SESSION['role'] == 'medecin')
{

include '../manager/db.php';

if($_SESSION['id'] == $_GET['id'])
{
  $stmt = $db->prepare('SELECT id FROM medecin WHERE id = ?');
  $stmt->execute([$_GET['id']]);
  $email = $stmt->fetchColumn();

  if($email)
  {

    ?>





      <!DOCTYPE html>
  <html>
  	<head>
  		<meta charset="utf-8">
  		<title>Changement mot de passe</title>
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">

  		<!-- MATERIAL DESIGN ICONIC FONT -->
  		<link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
          <link rel="stylesheet" href="css/style4.css">
  		<!-- STYLE CSS -->
  		<link rel="stylesheet" href="../css/style3.css">
  	</head>

  	<body>

  		<div class="wrapper">
  			<div class="inner">
  				<form method="post">
  					<h3>Nouveau mot de passe</h3>
  					<p>Validez votre nouveau mot de passe en fonction de votre compte.</p>


            <label class="form-group">
              <input type="password" id="myInput" name="newPassword" class="form-control" value="" required>
              <span for="">Mot de passe</span>
              <span class="border"></span>
<br>


            </label>

            <label class="form-group">
              <input type="password" id="myInpute" name="newPassword_confirme" class="form-control" value="" required>
              <span for="">Mot de passe</span>
              <span class="border"></span>


            </label>

            <input type="checkbox" onclick="myFunction()">Afficher le mot de passe
                      <script>
                      function myFunction() {
                      var x = document.getElementById("myInput");
                      if (x.type === "password") {
                      x.type = "text";
                      } else {
                      x.type = "password";
                      }
                      var x = document.getElementById("myInpute");
                      if (x.type === "password") {
                      x.type = "text";
                      } else {
                      x.type = "password";
                      }
                      }
                      </script>


  				<center>

         	<button type="submit" name="Confirmer">Valider
 </center>
</button> <br><br>

            <?php



          if(isset($_POST['newPassword']) AND isset($_POST['newPassword_confirme']))
          {
            if($_POST['newPassword'] == $_POST['newPassword_confirme'])
            {
            $hashedPassword = md5($_POST['newPassword_confirme']);
            $sql = "UPDATE medecin SET mdp = ? WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$hashedPassword, $email]);
            header ('location:../index.php?stmt=good');
          }
          else
          {
             echo 'Mots de passes incorrectes.';
          }
   }




         ?>

  				</form>
  			</div>
  		</div>

<?php }
}
else { echo 'Erreur, vous ne pouvez pas changer le mot de passe des autres utilisateurs !';}
 ?>
  	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
  </html>

<?php } ?>
