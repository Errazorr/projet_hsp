<?php
  require "PHPMailer/PHPMailerAutoload.php";
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');

  if(isset($_POST['valider_email'])) {

    $email = $_POST['email'];
    $requete_sur_email = $bdd->prepare('SELECT * FROM compte WHERE mail = ?');
    $requete_sur_email->execute(array($email));
    if ($requete_sur_email->rowCount() > 0) {
      $info_user = $requete_sur_email->fetch();



function smtpmailer($to, $from, $from_name, $subject, $body)

 {

     $mail = new PHPMailer();

     $mail->IsSMTP();

     $mail->SMTPAuth = true;



     $mail->SMTPSecure = 'ssl';

     $mail->Host = 'smtp.gmail.com';

     $mail->Port = 465;



     $mail->Username = 'ryannathanslam@gmail.com';

     $mail->Password = 'projethsp2020?';





     $mail->IsHTML(true);



     $mail->From="ryannathanslam@gmail.com";

     $mail->FromName=$from_name;

     $mail->Sender=$from;

     $mail->AddReplyTo($from, $from_name);

     $mail->Subject = $subject;

     $mail->Body = $body;

     $mail->AddAddress($to);

     if(!$mail->Send())

     {

         $error ="Une erreur s'est produite lors de l'envoie du mail !";

         return $error;

     }

     else

     {

         $error = "Email envoyé avec succès !";

         return $error;

     }

 }





 $to   = $info_user['mail'];



 $from = 'ryannathanslam@gmail.com';



 $name = 'Hopital Zoldyck';



 $subj = 'Recupération du mot de passe';



 $msg = " <a href='http://localhost/projet_hsp/projet_hsp/modification_mdp.php'>
 Changez  votre mot de passe</a>";



 $error=smtpmailer($to, $from, $name ,$subj, $msg);



      
    } else {
      echo 'Email invalide';
    }


  }
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mot de passe oublié</title>
  </head>
  <body>
    <div align="center">
        <form action="" method="post">
          <input type="mail" name="email" value="">
          <br>
          <input type="submit" name="valider_email" value="Valider">

        </form>
        <?php
        if(isset($error)) {
          echo $error;
        }
         ?>
    </div>

  </body>
</html>
