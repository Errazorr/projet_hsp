<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Prise de rendez-vous</title>
    <link rel="icon" href="../img/favicon.png">
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
                            <h2>Prenez de rendez-vous</h2>
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
                    <div class="section_tittle text-center">
                        <h2> Prenez un rendez-vous avec un de nos docteurs</h2>
                        <p>Nos docteurs ont chacun leurs spécialités dans différents domaines</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="../img/doctor/doctor_1.png" alt="doctor">
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>DR Aggoun</h3>
                                <p>Spécialiste en neurologie</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="../img/doctor/doctor_4.png" alt="doctor">
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>DR Guo</h3>
                                <p>Spécialiste en tabacologie</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="../img/doctor/doctor_2.png" alt="doctor">
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>DR Tang</h3>
                                <p>Spécialiste en gynécologie</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="../img/doctor/doctor_3.png" alt="doctor">
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>DR Birba</h3>
                                <p>Spécialiste en Cardiologie</p>
                            </div>
                        </div>
                    </div>
                </div>
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

                           <h2>Vous désirez prendre un rendez-vous ?</h2> </center>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="nom" placeholder="Votre nom : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="prenom" placeholder="Votre prenom : ">
                                </div>
                                <div class="form-group col-md-6">
                                  <select class="form-control" name="medecin" placeholder="Choisissez un médecin">


                											<?php
                											// Sélection des films //
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
                                  <select class="form-control" name="medecin" placeholder="Choisissez une heure">
                												<option>08:00</option>
                                        <option>08:30</option>
                                        <option>09:00</option>
                                        <option>09:30</option>
                                        <option>10:00</option>
                                        <option>10:30</option>
                                        <option>11:00</option>
                                        <option>11:30</option>
                                        <option>12:00</option>
                                        <option>12:30</option>
                                        <option>13:00</option>
                                        <option>13:30</option>
                                        <option>14:00</option>
                                        <option>14:30</option>
                                        <option>15:00</option>
                                        <option>15:30</option>
                                        <option>16:00</option>
                                        <option>16:30</option>
                                        <option>17:00</option>
                                        <option>17:30</option>
                                        <option>18:00</option>
                                        <option>18:30</option>
                                        <option>19:00</option>
                                        <option>19:30</option>
                                        <option>20:00</option>
                                        <option>20:30</option>
                                        <option>21:00</option>
                                        <option>21:30</option>
                                        <option>22:00</option>
                									</select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="textarea" class="form-control" name="rais_consult" placeholder="Votre raison pour la consultation : ">
                                </div>

                                <br/> </br/>
                            </div>
                            <div class="regerv_btn"><center>
                                <input type="submit" class="genric-btn primary e-large" value="Valider le rendez-vous">
                                <br/>  </center>
                              </br/>
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
