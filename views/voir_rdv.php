<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>medical</title>
  <link rel="icon" href="../img/favicon.png">
  <?php
      require_once('navbar.php');
    ?>

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
              <h2>Voir les rendez-vous</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">


      <div class="section-top-border">
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							<div class="visit">Nom patient</div>
							<div class="visit">Nom médecin</div>
							<div class="visit">Date de consultation</div>
							<div class="visit">Heure de consultation</div>
              <div class="visit">Raison de la consultation</div>
						</div>

            <?php
              if ($_SESSION['role'] == "admin") {
                $req = $bdd->query('SELECT * FROM reservation');
                $donnees= $req->fetchall();
              }

              else if ($_SESSION['role'] == "medecin"){
                $req = $bdd->prepare('SELECT * FROM reservation WHERE nom_medecin=?');
                $req->execute(array($_SESSION['nom_medecin']));
                $donnees= $req->fetchall();
              }
              else{
                $req = $bdd->prepare('SELECT * FROM reservation WHERE nom_patient=?');
                $req->execute(array($_SESSION['nom']));
                $donnees= $req->fetchall();
              }


              foreach ($donnees as $value) {
                echo '<div class="table-row">
                  <div class="visit" style="color:#000000">'.$value["nom_patient"].'</div>
                  <div class="visit" style="color:#000000">'.$value["nom_medecin"].'</div>
                  <div class="visit" style="color:#000000">'.$value["date_consult"].'</div>
                  <div class="visit" style="color:#000000">'.$value["time_consult"].'</div>
                  <div class="visit" style="color:#000000">'.$value["rais_consult"].'</div>
                </div>';
              }

             ?>



					</div>
				</div>
			</div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

  <?php
  require_once('footer.php');
   ?>
</html>
