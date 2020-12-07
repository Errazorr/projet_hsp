<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title style="font-family: Arial, sans-serif">Prise de rendez-vous</title>
    <link rel="icon" href="../img/logo3icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript">$(document).ready(function() {
    $('#time_consult').select2();
    });</script>

    <?php
          require_once('navbar.php');
        ?>
<body>
  <!-- Test de connexion à la bdd -->
	<?php
	//Connexion à la bdd
	try{
		$bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
	}
	catch (Exception $e){
		die('Erreur:'.$e->getMessage());
	}
	?>


    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2 style="font-family: Arial, sans-serif">rendez-vous</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
    <!--::doctor_part start::-->
    <section class="doctor_part section_padding">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                  <?php
                     if(isset($_GET['rdv_err']))
                     {
                       $err = htmlspecialchars($_GET['rdv_err']);

                       switch($err)
                       {
                         case 'heure':
                         ?>
                         <div class="alert alert-danger">
                         <center><p style="color: red;"> Il y a un déjà un rendez-vous à cette heure là !</p>
                         </div>
                         <?php
                         break;

                         case 'date':
                         ?>
                         <div class="alert alert-danger">
                         <center><p style="color: red;"> La date est invalide ! </p>
                         </div>
                         <?php
                         break;
                       }
                     }
                         ?>
                    <div class="section_tittle text-center">
                        <h2 style="font-family: Arial, sans-serif"> Prenez un rendez-vous avec un de nos docteurs</h2>
                        <p style="font-family: Arial, sans-serif">Nos docteurs ont chacun leurs spécialités dans différents domaines</p>
                    </div>
                </div>
            </div>
            <div class="row">
              <?php
              try{
                    $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');

                  }
              catch (Exception $e){
                    die('Erreur:'.$e->getMessage());
              }

              $req = $bdd->query('SELECT * FROM medecin');
              $donnees= $req->fetchall();


              foreach ($donnees as $value) {
                echo '<div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="../admin/images/'.$value['image'].'" alt="doctor">
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3 style="font-family: Arial, sans-serif">DR '.$value['nom'].'</h3>
                                <p style="color:black;"  style="font-family: Arial, sans-serif">Spécialiste en '.$value['specialite'].'</p> <br/>
                                
                                </br/>
                            </div>
                        </div>
                    </div>
                </div>';
              }
               ?>
            </div>
        </div>
    </section>
    <!--::doctor_part end::-->

    <!--::regervation_part start::-->
    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-12">

                   <div class="regervation_part_iner">
                        <form action="../traitement/reservation.php" method="post">
                          <center>

                           <h2 style="font-family: Arial, sans-serif">Vous désirez prendre un rendez-vous ?</h2> </center>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                  <select class="form-control" name="medecin" placeholder="Choisissez un médecin">


                											<?php
                											// Sélection des médecins //
                											$req = $bdd->query('SELECT nom FROM medecin');
                									    $donnees= $req->fetchall();

                											foreach ($donnees as $value) {
                												//Affichage des données //
                												echo '<option>'.$value["nom"].'</option>';
                											}
                											?>

                									</select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" name="date_consult" placeholder="Votre date pour la consultation : ">
                                </div>
                                <div class="form-group col-md-6">
                                  <select class="form-control" id ="time_consult" name="time_consult" placeholder="Choisissez une heure">

                                    <?php
                                      for ($i=8; $i < 22 ; $i++) {
                                        echo '<option>'.$i.':00'.'</option>';
                                        echo '<option>'.$i.':30'.'</option>';
                                      }
                                    ?>
                									</select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="textarea" class="form-control" name="rais_consult" placeholder="Votre raison pour la consultation : ">
                                </div>

                                <br/> </br/>
                            </div>
                            <div class="regerv_btn"><center>

<br>
                                <input type="submit" class="btn_1" name="btn" value="Valider" style="font-family: Arial, sans-serif">
                                  </center>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::regervation_part end::-->

    <?php
    require_once('footer.php');
     ?>

</html>
