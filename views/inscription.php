<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inscription</title>
    <link rel="icon" href="../img/logo3icon.png">
    <?php
      require_once('navbar.php');
    ?>

     <!-- breadcrumb start-->
     <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Inscription</h2>

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
                        <form action="../traitement/inscription.php" method="post">
                          <center>

                           <h2>Vous désirez prendre un rendez-vous ? Inscrivez-vous : </h2> </center>
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


                                <input type="submit" class="btn_1" name="btn" value="Créer son compte">
                                <br/>  </center>

                              </br/>		<center>
<br/>

</br/>
                                <a href="connexion.html" class="genric-btn danger-border circle arrow"> Déjà un compte ? Se connecter <span
                        						class="lnr lnr-arrow-right"></span></a></center>
                            </div>


                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--::regervation_part end::-->

    <?php
    require_once('footer.php');
     ?>

</html>
