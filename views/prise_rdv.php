<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Prise de rendez-vous</title>
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
    <!--::header part start::-->
    <header class="main_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="../index.html"> <img src="../img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-center"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">about</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Doctor.html">Doctors</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="services.html">services</a>
                                        <a class="dropdown-item" href="dep.html">depertments</a>
                                        <a class="dropdown-item" href="elements.html">Elements</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="blog.html">blog</a>
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <a class="btn_2 d-none d-lg-block" href="#">HOT LINE- 09856</a>
                    </nav>
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
                            <h2>Prise de rendez-vous</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::doctor_part start::-->
    <section class="doctor_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2> Prenez un rendez-vous avec un de nos docteurs</h2>
                        <p>Nos docteurs ont chacun leurs spécialités dans différents domaines</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="../img/doctor/doctor_1.png" alt="doctor">
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>DR Aggoun</h3>
                                <p>Spécialiste en neurologie</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="../img/doctor/doctor_4.png" alt="doctor">
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>DR Guo</h3>
                                <p>Spécialiste en tabacologie</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="../img/doctor/doctor_2.png" alt="doctor">
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>DR Tang</h3>
                                <p>Spécialiste en gynécologie</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="../img/doctor/doctor_3.png" alt="doctor">
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>DR Birba</h3>
                                <p>Spécialiste en Cardiologie</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::doctor_part end::-->

    <!--::regervation_part start::-->
    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-12">

                   <div class="regervation_part_iner">
                        <form action="../traitement/reservation.php" method="post">
                          <center>

                           <h2>Vous désirez prendre un rendez-vous ?</h2> </center>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="nom" placeholder="Votre nom : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="name" class="form-control" name="prenom" placeholder="Votre prenom : ">
                                </div>
                                <div class="form-group col-md-6">
                                  <select class="form-control" name="medecin" placeholder="Choisissez un médecin">


                											<?php
                											// Sélection des films //
                											$req = $bdd->query('SELECT nom FROM medecin');
                									    $donnees= $req->fetchall();

                											foreach ($donnees as $value) {
                												//Affichage des données //
                												echo '<option>'.$value["nom"].'</option>';
                											}
                											?>

                									</select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" name="date_consult" placeholder="Votre date pour la consultation : ">
                                </div>
                                    <input type="textarea" class="form-control" name="rais_consult" placeholder="Votre raison pour la consultation : ">
                                <br/> </br/>
                            </div>
                            <div class="regerv_btn"><center>
                                <input type="submit" class="genric-btn primary e-large" value="Valider le rendez-vous">
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

    <!-- footer part start-->
    <footer class="footer-area">
        <div class="footer section_padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-2 col-md-4 col-sm-6 single-footer-widget">
                        <a href="#" class="footer_logo"> <img src="../img/logo.png" alt="#"> </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </p>
                    </div>
                    <div class="col-xl-2 col-sm-6 col-md-4 single-footer-widget">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Department</a></li>
                            <li><a href="#"> Online payment</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Department</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-md-6 single-footer-widget">
                        <h4>Newsletter</h4>
                        <p>Seed good winged wherein which night multiply
                            midst does not fruitful</p>
                        <div class="form-wrap" id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">
                                <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                                    required="" type="email">
                                <button class="click-btn btn btn-default text-uppercase"> <i class="ti-angle-right"></i>
                                </button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                        type="text">
                                </div>

                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright_part">
            <div class="container">
                <div class="row align-items-center">
                    <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                    <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"> <i class="ti-twitter"></i> </a>
                        <a href="#"><i class="ti-instagram"></i></a>
                        <a href="#"><i class="ti-skype"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- footer part end-->

    <!-- jquery plugins here-->

    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- owl carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- contact js -->
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/contact.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>
