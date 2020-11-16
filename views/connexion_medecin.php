<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connexion</title>
    <link rel="icon" href="../img/logo3icon.png">
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
                            <h2>Connexion (médecin)</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::regervation_part start::-->
    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-12">

                   <div class="regervation_part_iner">
                        <form method="post" action="../traitement/connexion_medecin.php">
                          <center>

                           <h2>Vous êtes médecin certifié ? Connectez-vous : </h2> </center>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="identifiant" class="form-control" required="required" placeholder="Votre identifiant : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="password" name="mdp" class="form-control"required
                                        placeholder="Mot de passe : ">
                                </div>

                            </div>
                            <div class="regerv_btn"><center>


                                <input type="submit" class="btn_1" name="btn" value="Valider">
                                <a href="connexion.php" class="genric-btn danger-border circle arrow">Retour<span
                        						class="lnr lnr-arrow-right"></span></a>
                                <br/>
                                  </center>

                              </br/>		<center>
<br/>


                            </div>


                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--::regervation_part end::-->

    <!-- footer part start-->



</body>

</html>
