<?php
include 'manager/db.php';
 ?>



     <!DOCTYPE html>
 <html>
 	<head>
 		<meta charset="utf-8">
 		<title style="font-family: Arial, sans-serif">Mot de passe oublié</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1.0">

 		<!-- MATERIAL DESIGN ICONIC FONT -->
 		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

 		<!-- STYLE CSS -->
 		<link rel="stylesheet" href="css/style3.css">
 	</head>

 	<body>

 		<div class="wrapper">
 			<div class="inner">
 				<form method="post">
 					<h3 style="font-family: Arial, sans-serif">Mot de passe oublié ? </h3>
 					<p style="font-family: Arial, sans-serif">Récupérez votre mot de passe via votre adresse mail.</p>

 					<label class="form-group">
 						<input type="mail" name="email" class="form-control" value="" required style="font-family: Arial, sans-serif">
 						<span for="" style="font-family: Arial, sans-serif">Adresse mail</span>
 						<span class="border"></span>
 					</label>

 				<center>

        	<button type="submit" name="ok_modifier_membre" style="font-family: Arial, sans-serif">Valider
</center>
 					</button>
          <?php

          if(isset($_POST['email']))
          {
            $token = uniqid();
            $url = "http://localhost/projet_hsp/projet_hsp/token?token=$token";

            $message = "Bonjour, voici votre lien pour la réinitialisation : $url";
            $headers = 'Content-Type: text/plain; charset="utf-8"'." ";

            if(mail($_POST['email'], 'Mot de passe oublié', $message, $headers))
            {
              $sql = "UPDATE patient SET token = ? WHERE mail = ?";
              $stmt = $db->prepare($sql);
              $stmt->execute([$token, $_POST['email']]);
              echo 'Mail envoyé!';
            }
            else {
              echo "Une erreur est survenue...";
            }
          }

          ?>
 				</form>
 			</div>
 		</div>

 	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
 </html>
