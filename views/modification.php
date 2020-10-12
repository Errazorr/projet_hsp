<!doctype html>
<html lang="en">

<!-- Test de connexion a la bdd -->
<?php
session_start();

try{
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
}
catch (Exception $e){
  die('Erreur:'.$e->getMessage());
}

//Sélection des id de la table compte en fonction du nom //
$req = $bdd->prepare('SELECT id FROM compte WHERE mail=?');

//$req->execute(array($_SESSION['mail']));
$req->execute(array("k.kebiche@gmail.com"));
$id= $req->fetch();
$_SESSION['id'] = $id[0];

//Sélection de l'ensemble des informations de la table compte en fonction de l'id //
$rec = $bdd->prepare('SELECT * FROM compte WHERE id=?');
$rec->execute(array($id[0]));
$donnees= $rec->fetch();
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modifier son profil</title>
    <link rel="icon" href="../img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="../css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="../css/flaticon.css">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="../css/nice-select.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="../css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

     <!-- breadcrumb start-->
     <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Modification</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

  <!-- feature_part start
    <section class="feature_part single_feature_page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2>Our services</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 col-sm-12">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="../img/icon/feature_1.svg" alt=""></span>
                            <h4>Better Future</h4>
                            <p>Darkness multiply rule Which from without life creature blessed
                                give moveth moveth seas make day which divided our have.</p>
                        </div>
                    </div>
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="../img/icon/feature_2.svg" alt=""></span>
                            <h4>Better Future</h4>
                            <p>Darkness multiply rule Which from without life creature blessed
                                give moveth moveth seas make day which divided our have.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                        <div class="single_feature_img">
                            <img src="../img/service.png" alt="">
                        </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="../img/icon/feature_1.svg" alt=""></span>
                            <h4>Better Future</h4>
                            <p>Darkness multiply rule Which from without life creature blessed
                                give moveth moveth seas make day which divided our have.</p>
                        </div>
                    </div>
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="../img/icon/feature_2.svg" alt=""></span>
                            <h4>Better Future</h4>
                            <p>Darkness multiply rule Which from without life creature blessed
                                give moveth moveth seas make day which divided our have.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  -->



    <!--::regervation_part start::-->
    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-12">

                   <div class="regervation_part_iner">
                        <form action="../traitement/inscription.php" method="post">
                          <center>

                           <h2>Vous désirez changer vos données? </h2> </center>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="nom" placeholder="Votre nom : " <?php echo 'value='.'"'.$donnees["nom"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="prenom" placeholder="Votre prénom : " <?php echo 'value='.'"'.$donnees["prenom"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" name="date_naissance" placeholder="Votre date de naissance : " <?php echo 'value='.'"'.$donnees["date_naissance"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" name="mail" placeholder="Votre mail : " <?php echo 'value='.'"'.$donnees["mail"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="adresse" placeholder="Votre adresse : " <?php echo 'value='.'"'.$donnees["adresse"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="mutuelle" placeholder="Votre mutuelle : " <?php echo 'value='.'"'.$donnees["mutuelle"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="tel" class="form-control" name="num_sec_soc"   maxlength="15" placeholder="Votre numéro de sécurité sociale : " <?php echo 'value='.'"'.$donnees["num_sec_soc"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="option_chambre" placeholder="Vos options de chambre (Wifi et/ou TV) : " maxlength="10" <?php echo 'value='.'"'.$donnees["option_chambre"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="regime" placeholder="Votre régime : " <?php echo 'value='.'"'.$donnees["regime"].'"'.''?>>
                                </div>
<br/>
  </br/>

                            </div>
                            <div class="regerv_btn"><center>


                                <input type="submit" class="btn_1" name="btn" value="Modifier son compte">
                                <br/>  </center>

                              </br/>		<center>
<br/>

</br/>
                                <a href="../landing.php" class="genric-btn danger-border circle arrow"> Modifier son mot de passe? <span
                        						class="lnr lnr-arrow-right"></span></a></center>
                            </div>


                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--::regervation_part end::-->

</body>

</html>