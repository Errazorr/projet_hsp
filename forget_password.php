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
        <?php
        //MESSAGE D'ERREUR SI LE COMPTE N'EXISTE PAS
           if(isset($_GET['password_err']))
           {
             $err = htmlspecialchars($_GET['password_err']);

             switch($err)
             {
               case 'nonexiste':
               ?>
               <div class="alert alert-danger">
             <center><h1 style="color: #DC143C;"> Votre compte n'existe pas. Veuillez en créer un !</h1><br>
   </div>
               <?php
               break;
             }
           }

           //MESSAGE SI LE MDP A ETE MODIFIE
           if(isset($_GET['password_suc']))
           {
             $err = htmlspecialchars($_GET['password_suc']);

             switch($err)
             {
                          case '1':
                          ?>
                          <div class="alert alert-danger">
                        <center><p style="color: #green;"> Mail envoyé ! Pensez à consulter vos courriers indesirrables. </p>
              </div>
                          <?php
                          break;
}
}
         ?>
 				<form method="post">
 					<h3 style="font-family: Arial, sans-serif">Mot de passe oublié </h3>
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
          //SI EMAIL N'EST PAS VIDE
          if(isset($_POST['email']))
          {

          $req = $db->prepare('SELECT count(*) as numberEmail FROM patient WHERE mail=?');
          $req->execute(array($_POST['email']));
          $email_verification = $req->fetch();

            //SI LE MAIL EXISTE
            if($email_verification['numberEmail'] == 1){
              //CREATION DE TOKEN UNIQUE
            $token = uniqid();
            $url = "http://localhost/projet_hsp/projet_hsp/token?token=$token";

            $message = "Bonjour, voici votre lien pour la réinitialisation : $url";
            $headers = 'Content-Type: text/plain; charset="utf-8"'." ";

            //ENVOI DE MAIL ET MODIFICATION DE PATIENT POUR TOKEN
            if(mail($_POST['email'], 'Mot de passe oublié', $message, $headers))
            {
              $sql = "UPDATE patient SET token = ? WHERE mail = ?";
              $stmt = $db->prepare($sql);
              $stmt->execute([$token, $_POST['email']]);
              header('location:forget_password.php?password_suc=1');
            }
            //MESSAGE D'ERREUR
            else {
              echo "Une erreur est survenue...";
            }
          }
          else
          {
            header('location:forget_password.php?password_err=nonexiste');
            exit();
          }
        }

          ?>
 				</form>
        <?php
           if(isset($_GET['password_err']))
           {
             $err = htmlspecialchars($_GET['password_err']);
?> <center><br><br>
<b><h1><a style="color: #39ff22;"href="views/inscription.php"> > S'inscrire < </a></h1> <?php } ?></b>
<!--<?php
   //if(isset($_GET['password_suc']))
   //{
     //$err = htmlspecialchars($_GET['password_suc']);
?>--> <center><br><br>
<b><a style="color: #00ade6;"href="index.php"> > Retourner à l'accueil < </a> </b>
 			</div>
 		</div>

 	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
 </html>
