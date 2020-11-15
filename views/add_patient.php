<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste des patients</title>
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
                            <h2>Liste des </br> patients</h2>
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
                <div class="visit">Nom </div>
                <div class="visit">Prénom</div>
                <div class="visit">Date de naissance</div>
                <div class="visit">Adresse</div>
                <div class="visit">Sécurité Sociale</div>
                <div class="visit">Mail</div>
              </div>

              <?php
              //SI ADMIN
                if ($_SESSION['role'] == "admin") {
                  //SELECTION DANS LA BDD
                  $req = $bdd->query('SELECT * FROM patient');
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
                    <div class="visit" style="color:#000000">'.$value["date_naissance"].'</div>
                    <div class="visit" style="color:#000000">'.$value["adresse"].'</div>
                    <div class="visit" style="color:#000000">'.$value["num_sec_soc"].'</div>
                    <div class="visit" style="color:#000000">'.$value["mail"].'</div>
                  </div>';
                }

               ?>
            </div>


          </div>
        </div>

        <div align="center">

        <?php
        $select_all_members = $bdd->query('SELECT * FROM patient');
        if($select_all_members->rowCount() > 0)
        {
          while($m = $select_all_members->fetch()){
            ?>
            <b><?= $m['nom']; ?> <?= $m['prenom']; ?></b> <a href="modify.php?id=<?= $m['id']; ?>" style="text-decoration: none; color: orange;">Modifier</
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

    <?php
    require_once('footer.php');
     ?>

</html>
