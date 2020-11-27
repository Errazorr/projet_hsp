<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title style="font-family: Arial, sans-serif">Liste des patients</title>
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
                            <h2 style="font-family: Arial, sans-serif">Liste des </br> patients</h2>
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
                <div class="visit" style="font-family: Arial, sans-serif">Nom </div>
                <div class="visit" style="font-family: Arial, sans-serif">Prénom</div>
                <div class="visit" style="font-family: Arial, sans-serif">Date de naissance</div>
                <div class="visit" style="font-family: Arial, sans-serif">Adresse</div>
                <div class="visit" style="font-family: Arial, sans-serif">Sécurité Sociale</div>
                <div class="visit" style="font-family: Arial, sans-serif">Mail</div>
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
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["nom"].'</div>
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["prenom"].'</div>
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["date_naissance"].'</div>
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["adresse"].'</div>
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["num_sec_soc"].'</div>
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["mail"].'</div>
                  </div>';
                }

               ?>
            </div>


          </div>
        </div>



      </div>
    </section>

    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-12">

                   <div class="regervation_part_iner">
                        <form action="../traitement/add_patient.php" method="post">
                          <center>

                           <h2>Ajouter un patient : </h2> </center>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="nom" placeholder="Votre nom : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="prenom" placeholder="Votre prénom : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" name="date_naissance" placeholder="Votre date de naissance : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" name="mail" required placeholder="Votre mail : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="adresse" placeholder="Votre adresse : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="mutuelle" placeholder="Votre mutuelle : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="tel" class="form-control" name="num_sec_soc"   maxlength="15" placeholder="Votre numéro de sécurité sociale : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="option_chambre" placeholder="Vos options de chambre (Wifi et/ou TV) : " maxlength="10">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="regime" placeholder="Votre régime : ">
                                </div>
<br/>
  </br/>
                                <div class="form-group col-md-6">
                                    <input type="password" class="form-control" name="mdp" required
                                        placeholder="Mot de passe : ">
                                </div>

                            </div>
                            <div class="regerv_btn"><center>

<br>
                                <input type="submit" class="btn_1" name="btn" value="Valider">
                                <br/>  </center>

                              </br/>		<center>

                            </div>


                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <br>

    <div align="center">

    <?php
    $select_all_members = $bdd->query('SELECT * FROM patient');
    if($select_all_members->rowCount() > 0)
    {
      while($m = $select_all_members->fetch()){
        ?>
        <b style="font-family: Arial, sans-serif"><?= $m['nom']; ?> <?= $m['prenom']; ?></b> <a href="modify.php?id=<?= $m['id']; ?>" style="text-decoration: none; color: orange;" style="font-family: Arial, sans-serif">Modifier</
          a><hr/>  <!-- on passe en paramètre de l'url l'id pour pouvoir récup l'identifiant-->
        <?php
      }
    } else {
      echo 'Aucun membre';
    }

     ?>


   </div>

    <?php
    require_once('footer.php');
     ?>

</html>
