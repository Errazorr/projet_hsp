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
                     <?php
                     //MESSAGES D'ERREUR LORS DE L'INSCRIPTION
                        if(isset($_GET['ins_err']))
                        {
                          $err = htmlspecialchars($_GET['ins_err']);

                          switch($err)
                          {
                            case 'existe':
                            ?>
                            <div class="alert alert-danger">
                            <center><p style="color: red;"> Ce compte existe déjà !</p>
                            </div>
                            <?php
                            break;

                            case 'champs':
                            ?>
                            <div class="alert alert-danger">
                            <center><p style="color: red;"> Veuillez remplir les champs obligatoires !</p>
                            </div>
                            <?php
                            break;

                            case 'numsecsoc':
                            ?>
                            <div class="alert alert-danger">
                            <center><p style="color: red;"> Veuillez écrire un numéro de sécurité sociale correct !</p>
                            </div>
                            <?php
                            break;

                            case 'prenom':
                            ?>
                            <div class="alert alert-danger">
                            <center><p style="color: red;"> Veuillez entrer un prénom correct !</p>
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
                        <form action="../traitement/inscription.php" method="post">
                          <center>

                           <h2 style="font-family: Arial, sans-serif">Vous désirez prendre un rendez-vous ? Inscrivez-vous : </h2> </center>
                           <center>

                          <b>  <h3 style="color: #B22222; font-family: Arial, sans-serif" >Champs obligatoires </h3> </center>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="nom" placeholder="Nom *">
                                </div>
                                <div class="form-group col-md-6">
                                    <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="prenom" placeholder="Prénom *">
                                </div>
                                <div class="form-group col-md-6">
                                    <input style="font-family: Arial, sans-serif" type="date" class="form-control" name="date_naissance" placeholder="Votre date de naissance : ">
                                </div>
                                <div class="form-group col-md-6">
                                    <input style="font-family: Arial, sans-serif" type="email" class="form-control" name="mail" required placeholder="Mail *">
                                </div>

                                <div class="form-group col-md-6">
                                    <input style="font-family: Arial, sans-serif" type="tel" class="form-control" name="num_sec_soc"   maxlength="15" placeholder="Numéro sécurité sociale *">
                                </div>

<br/>
  </br/>
                                <div class="form-group col-md-6">
                                    <input style="font-family: Arial, sans-serif" type="password" class="form-control" name="mdp" required
                                        placeholder="Mot de passe *">
                                </div>

                            </div><br><br>
                            <center>  <h3 style="color: #39ff22; font-family: Arial, sans-serif" >Facultatif </h3> </center>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="adresse" placeholder="Adresse">
                            </div>
                            <div class="form-group col-md-6">
                                <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="mutuelle" placeholder="Mutuelle">
                            </div>
                            <div class="form-group col-md-6">
                                <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="option_chambre" placeholder="Vos options de chambre (Wifi et/ou TV) : " maxlength="10">
                            </div>
                            <div class="form-group col-md-6">
                                <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="regime" placeholder="Votre régime : ">
                            </div>
                          </div>


                            <div class="regerv_btn"><center>


                                <input style="font-family: Arial, sans-serif" type="submit" class="btn_1" name="btn" value="Créer son compte">
                                <br/>  </center>

                              </br/>		<center>
<br/>

</br/>
                                <a href="connexion.php" class="genric-btn danger-border circle arrow" style="font-family: Arial, sans-serif"> Déjà un compte ? Se connecter <span
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
