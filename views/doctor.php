<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nos médecins</title>
    <link rel="icon" href="../img/logo3icon.png">
    <?php
      require_once('navbar.php'); //ON APPELLE LA NAVBAR
    ?>

    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2 style="font-family: Arial, sans-serif">Médecins</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::doctor_part start::-->
    <section class="doctor_part single_page_doctor_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2 style="font-family: Arial, sans-serif"> Des médecins expérimentés</h2>
                        <p style="font-family: Arial, sans-serif">Nos médecins ont fait de longues études et sont très compétents dans leurs domaines</p>
                    </div>
                </div>
            </div>
            <div class="row">
              <?php
              //CONNEXION BDD
              try{
                    $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','nathan','oskour');

                  }
              catch (Exception $e){
                    die('Erreur:'.$e->getMessage());
              }

              $req = $bdd->query('SELECT * FROM medecin'); //ON STOCK DANS LA VARIABLE req LA REQUETE
              $donnees= $req->fetchall();//ON STOCK LE RESULTAT DANS donnees
              //fetchall retourne un tableau contenant toutes les lignes

              foreach ($donnees as $value) { //POUR CHAQUE RESULTAT TROUVE, ON PARCOUR LE TABLEAU
                //A CHAQUE ITERATION, LA VALEUR EST ASSIGNEE A value
                echo '<div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="../admin/images/'.$value['image'].'" alt="doctor">
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3 style="font-family: Arial, sans-serif">DR '.$value['nom'].'</h3>
                                <p style="color:black;"  style="font-family: Arial, sans-serif">Spécialiste en '.$value['specialite'].'</p>
                            </div>
                        </div>
                    </div>
                </div>';
              }//ON A RECUPERER LA VALEUR image DE LA BDD DANS VARIABLE value
               ?>
            </div>
        </div>
    </section>
    <!--::doctor_part end::-->

    <?php
    require_once('footer.php');// ON APPELLE LE FOOTER
     ?>
</html>
