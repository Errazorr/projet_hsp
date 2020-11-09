<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hôpital - Admins</title>
    <link rel="icon" href="../img/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
                            <h2>Admins</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <section class="contact-section section_padding">
      <div class="container">


        <div class="section-top-border">
          <div class="progress-table-wrap">
            <div class="progress-table">
              <div class="table-head">
                <div class="visit">Nom</div>
                <div class="visit">Prénom</div>
                <div class="visit">Mail</div>
                <div class="visit">Role</div>

              </div>

              <?php
              //SI ADMIN
                if ($_SESSION['role'] == "admin") {
                  //SELECTION DANS LA BDD
                  $req = $bdd->query('SELECT * FROM admin');
                  $donnees= $req->fetchall();
                }
                //SI PAS ADMIN
                else{
                  //PAS D'ACCES
                  echo 'Vous n\'avez pas accès à cette page';
                }

                //POUR CHAQUE LIGNE DANS LA TABLE
                foreach ($donnees as $value) {
                  //AFFICHAGE DANS LE TABLEAU
                  echo '<div class="table-row">
                    <div class="visit" style="color:#000000">'.$value["nom"].'</div>
                    <div class="visit" style="color:#000000">'.$value["prenom"].'</div>
                    <div class="visit" style="color:#000000">'.$value["mail"].'</div>
                    <div class="visit" style="color:#000000">'.$value["role"].'</div>
                  </div>';
                }

               ?>



            </div>
          </div>
        </div>
      </div>
    </section>


    <!--::regervation_part start::-->
    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-12">

                   <div class="regervation_part_iner">
                        <form action="../traitement/add_admin.php" method="post">
                          <center>

                           <h2>Ajouter un administrateur :</h2> </center>
                            <div class="form-row">

                              <div class="form-group col-md-6">
                                  <input type="text" class="form-control" name="nom" placeholder="Nom : ">
                              </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="prenom" placeholder="Prénom : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="mail" class="form-control" name="mail" placeholder="Mail : ">
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="password" class="form-control" name="mdp" placeholder="Mot de passe : ">
                                </div>

                                <div class="regerv_btn"><center> <br>
                                  <input type="submit" class="btn_1" name="btn" value="Valider">
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
