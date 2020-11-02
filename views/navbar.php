<!doctype html>
<html lang="en">

<?php
session_start();
 ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

    <link rel="stylesheet" href="../css/style2.css">
</head>


<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="../page_index.php"> <img src="../img/logo.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-center"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">

                          <?php
                          //Si il y a une session ouverte
                          if (isset($_SESSION['mail'])  || isset($_SESSION['nom_medecin'])){
                            //Si la personne est un client
                            if ($_SESSION['role'] == "patient") {
                           ?>
                            <li class="nav-item active">
                                <a class="nav-link" href="../page_index.php">Accueil</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Rendez-vous
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="prise_rdv.php">Prendre un rendez-vous</a>
                                    <a class="dropdown-item" href="voir_rdv.php">Voir mes rendez-vous</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="modification.php">Modifier mon compte</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../like_dislike/index.php">Avis</a>
                            </li>
                        </ul>
                    </div>
                    <a class="btn_2 d-none d-lg-block" href="../traitement/session_destroy.php">Déconnexion</a>


                  <?php  }
                          //Sinon si c'est un médecin
                         elseif ($_SESSION['role'] == "medecin"){ ?>
                           <li class="nav-item active">
                               <a class="nav-link" href="../page_index.php">Accueil</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="voir_rdv.php">Voir les rendez-vous</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="minichat.php">Minichat</a>
                           </li>
                       </ul>
                   </div>
                   <a class="btn_2 d-none d-lg-block" href="../traitement/session_destroy.php">Déconnexion</a>


                 <?php  }
                         //Sinon c'est donc un admin
                        else{ ?>
                          <li class="nav-item active">
                              <a class="nav-link" href="../page_index.php">Accueil</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="voir_rdv.php">Voir tous les rendez-vous</a>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Comptes
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="add_doctor.php">Nouveau médecin</a>
                                  <a class="dropdown-item" href="add_admin.php">Nouvel admin</a>
                                  <a class="dropdown-item" href="activate.php">Activer un compte</a>
                              </div>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Export
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="export_rdv.php">Exporter les rendez-vous</a>
                                  <a class="dropdown-item" href="export_file.php">Exporter un dossier d'admission</a>
                              </div>
                          </li>
                      </ul>
                  </div>
                  <a class="btn_2 d-none d-lg-block" href="../traitement/session_destroy.php">Déconnexion</a>


                <?php }
                    }
                    //Sinon il n'y a pas de sessions ouverte
                    else{ ?>
                      <li class="nav-item active">
                          <a class="nav-link" href="../page_index.php">Accueil</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="doctor.php">Médecins</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="contact.php">Contact</a>
                      </li>
                  </ul>
              </div>
              <a class="btn_2 d-none d-lg-block" href="connexion.php">Connexion</a>
              <?php	}  ?>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->
</html>
