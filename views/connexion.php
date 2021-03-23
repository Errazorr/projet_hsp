
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
                            <h2 style="font-family: Arial, sans-serif">Connexion</h2>

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
                     <?php
                     //MESSAGES D'ERREUR LORS DE LA CONNEXION
                        if(isset($_GET['login_errr'])) //S'IL EXISTE login_errr DANS L'URL VU QU'IL Y A GET
                        {
                          $err = htmlspecialchars($_GET['login_errr']); //ON STOCK DANS LA VARIABLE err CE QU'ON A RECUP AVEC htmlspecialchars

                          switch($err)
                          { //CHOIX MULTIPLE
                            case 'compteinexistant'://DANS LE CAS OU LA VARIABLE err DANS L'URL CORRESPOND A compteinexistant
                            ?>
                            <div class="alert alert-danger">
                            <center><p style="color: red;"> Ce compte n'existe pas !</p>
                            </div>
                            <?php
                            break; //ON STOP

                            case 'medecinnon': // CAS MEDECIN
                            ?>
                            <div class="alert alert-danger">
                            <center><p style="color: red;"> Erreur de connexion en tant que médecin !</p>
                            </div>
                            <?php
                            break;

                            case 'adminnon':
                            ?>
                            <div class="alert alert-danger">
                            <center><p style="color: red;"> Mot de passe incorrect !</p>
                            </div>
                            <?php
                            break;

                            case 'patientnon':
                            ?>
                            <div class="alert alert-danger">
                            <center><p style="color: red;"> Mot de passe incorrect !</p>
                            </div>
                            <?php
                            break;

                            case 'comptedesactive':
                            ?>
                            <div class="alert alert-danger">
                            <center><p style="color: red;"> Le compte est banni, contactez l'administrateur. </p><a style="color: white;" href="contact_form.php">Cliquez ici !</a>
                            </div>
                            <?php
                            break;
                          }
                        }
                      ?>
                        <form method="post" action="../traitement/connexion.php">
                          <center>

                           <h2 style="font-family: Arial, sans-serif">Vous avez déjà un compte ? Connectez-vous : </h2> </center>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input style="font-family: Arial, sans-serif" type="email" name="mail" class="form-control" required="required" placeholder="Votre adresse mail : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input style="font-family: Arial, sans-serif" type="password" id="myyInput" name="mdp" class="form-control"required
                                        placeholder="Mot de passe : ">
<br>
                                        <input style="font-family: Arial, sans-serif" type="checkbox" onclick="myFunction()">&ensp;Afficher le mot de passe
                                                  <script>
                                                  function myFunction() {
                                                  var x = document.getElementById("myyInput");
                                                  if (x.type === "password") {
                                                  x.type = "text";
                                                  } else {
                                                  x.type = "password";
                                                } }
                                                  </script>
                                </div>



                            </div><br>
                            <div class="regerv_btn"><center>


                                <input type="submit" class="btn_1" name="btn" value="Valider">

                                <br/>  </center>

                              </br/>		<center>
 <a href="../forget_password.php" style="font-family: Arial, sans-serif">Mot de passe oublié ? </a><br/>

</br/>
                                <a href="inscription.php" class="genric-btn danger-border circle arrow" style="font-family: Arial, sans-serif">Nouveau ici ? S'inscrire <span
                        						class="lnr lnr-arrow-right"></span></a>
                                    <a href="../index.php" class="genric-btn danger-border circle arrow" style="font-family: Arial, sans-serif">Retour<span
                            						class="lnr lnr-arrow-right"></span></a></center>
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

<!-- https://codewithawa.com/posts/like-dislike-system-with-php-and--mysql
