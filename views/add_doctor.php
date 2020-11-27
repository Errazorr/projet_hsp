<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title style="font-family: Arial, sans-serif">Médecins - Admin</title>
    <link rel="icon" href="../img/logo3icon.png">
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
                            <h2 style="font-family: Arial, sans-serif">Médecins <br> (Admin)</h2>
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
                <div class="visit" style="font-family: Arial, sans-serif">Nom médecin</div>
                <div class="visit" style="font-family: Arial, sans-serif">Lieu d'exercice</div>
                <div class="visit" style="font-family: Arial, sans-serif">Spécialité</div>
                <div class="visit" style="font-family: Arial, sans-serif">Identifiant</div>
                <div class="visit" style="font-family: Arial, sans-serif">Approuvé</div>
              </div>

              <?php
              //SI ADMIN
                if ($_SESSION['role'] == "admin") {
                  //SELECTION DANS LA BDD
                  $req = $bdd->query('SELECT * FROM medecin');
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
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["nom"].'</div>
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["lieu"].'</div>
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["specialite"].'</div>
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["identifiant"].'</div>
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["approuve"].'</div>
                  </div>';
                }

               ?>



            </div>
          </div>
        </div>

        <div align="center">

        <?php
        $select_all_members = $bdd->query('SELECT * FROM medecin');
        if($select_all_members->rowCount() > 0)
        {
          while($m = $select_all_members->fetch()){
            ?>
            <b style="font-family: Arial, sans-serif"><?= $m['nom']; ?> - <?= $m['specialite']; ?></b> <a href="modify.php?id=<?= $m['id']; ?>" style="text-decoration: none; color: orange;" style="font-family: Arial, sans-serif">Modifier</
              a><hr/>  <!-- on passe en paramètre de l'url l'id pour pouvoir récup l'identifiant-->
            <?php
          }
        } else {
          echo 'Aucun membre';
        }

         ?>


        </div>

      </div>
    </section>


    <!--::regervation_part start::-->
    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-12">

                   <div class="regervation_part_iner">
                        <form action="../traitement/add_doctor.php" method="post">
                          <center>

                           <h2 style="font-family: Arial, sans-serif">Ajouter un médecin :</h2> </center>
                            <div class="form-row">

                              <div class="form-group col-md-6">
                                  <input type="text" class="form-control" name="nom" placeholder="Nom : ">
                              </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="lieu" placeholder="Lieu d'exercice : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="specialite" placeholder="Spécialité : ">
                                </div>

                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="identifiant" placeholder="Pseudo/Identifiant : ">
                                </div>
                                <br>
                                </div>
                                <br>
                                <div class="form-group col-md-8">
                                    <input type="password" class="form-control" name="mdp" placeholder="Mot de passe : ">
                                </div>



                            <div class="regerv_btn"><center>
                                <input type="submit" class="genric-btn primary e-large" value="Valider le nouveau médecin">
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
