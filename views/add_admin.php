
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title style="font-family: Arial, sans-serif">Hôpital - Admins</title>
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
                            <h2 style="font-family: Arial, sans-serif">Admins</h2>
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
                <div class="visit" style="font-family: Arial, sans-serif">Nom</div>
                <div class="visit" style="font-family: Arial, sans-serif">Prénom</div>
                <div class="visit" style="font-family: Arial, sans-serif">Mail</div>
                <div class="visit" style="font-family: Arial, sans-serif">Role</div>

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
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["nom"].'</div>
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["prenom"].'</div>
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["mail"].'</div>
                    <div class="visit" style="color:#000000" style="font-family: Arial, sans-serif">'.$value["role"].'</div>
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

                           <h2 style="font-family: Arial, sans-serif">Ajouter un administrateur :</h2> </center>
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

                                <div class="regerv_btn"><center> <br><br>
                                   <?php echo '__________________________________________________________________________________'; ?><input type="submit" class="btn_1" value="Valider"> <?php echo '________________________________________________________________________________'; ?>
                                  <br/>  </center>

                                  </br/>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <br>

  <?php $select_all_members = $bdd->query('SELECT * FROM admin WHERE id ="'.$_SESSION['id'].'"');
  if($select_all_members->rowCount() > 0)
  {
    while($m = $select_all_members->fetch()){
?>

    <div class="text-center">
            <h1 class="p-5">Vous désirez modifier votre compte <?php echo $_SESSION['prenom']; ?>?</h1>
            <hr />
<br>
<br>  <center>  <p style="color:black;">Votre addresse mail : <strong style="color: black;"><?php echo $m['mail']; ?></strong>.</p>
    <br>  <center>  <p style="color:black;">Votre nom : <strong style="color: black;"><?php echo $m['nom']; ?></strong>.</p>
        <br>  <center>  <p style="color:black;">Votre prénom : <strong style="color: black;"><?php echo $m['prenom']; ?></strong>.</p>
<br>
  <a href="modify_admin.php?id=<?= $m['id']; ?>" > <input type="button"  value="Modifier mes informations"></a>
<br>
    </div>
        <br><br>

        <?php
      }
        } else {
        echo 'Aucun membre';
      } ?>

    <?php
    require_once('footer.php');
     ?>

</html>
