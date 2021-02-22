<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vision des rendez-vous</title>
  <link rel="icon" href="../img/logo3icon.png">
  <?php
      require_once('navbar.php');
    ?>

    <!-- Test de connexion à la bdd -->
    <?php
    //Connexion à la bdd
    try{
	     $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','nathan','oskour');
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
              <h2 style="font-family: Arial, sans-serif">Voir les rendez-vous</h2>
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
							<div class="visit" style="font-family: Arial, sans-serif">Nom patient</div>
							<div class="visit" style="font-family: Arial, sans-serif">Nom médecin</div>
							<div class="visit" style="font-family: Arial, sans-serif">Date de consultation</div>
							<div class="visit" style="font-family: Arial, sans-serif">Heure de consultation</div>
              <div class="visit" style="font-family: Arial, sans-serif">Raison de la consultation</div>
						</div>

            <?php
            //SI COMPTE ADMIN
              if ($_SESSION['role'] == "admin") {
                $req = $bdd->query('SELECT * FROM reservation');
                $donnees= $req->fetchall();
              }
              //SINON SI COMPTE MEDECIN
              else if ($_SESSION['role'] == "medecin"){
                $req = $bdd->prepare('SELECT * FROM reservation WHERE nom_medecin=?');
                $req->execute(array($_SESSION['nom_medecin']));
                $donnees= $req->fetchall();
              }
              //SINON COMPTE PATIENT
              else{
                $req = $bdd->prepare('SELECT * FROM reservation WHERE nom_patient=?');
                $req->execute(array($_SESSION['nom']));
                $donnees= $req->fetchall();
              }

              //POUR CHAQUE LIGNE DANS LA TABLE, ON AFFICHE
              foreach ($donnees as $value) {
                echo '<div class="table-row">
                  <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["nom_patient"].'</div>
                  <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["nom_medecin"].'</div>
                  <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["date_consult"].'</div>
                  <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["time_consult"].'</div>
                  <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["rais_consult"].'</div>
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
