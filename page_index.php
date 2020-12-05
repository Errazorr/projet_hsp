
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Site officiel de l'hôpital Zoldyck</title>
    <link rel="icon" href="img/logo3icon.png">
    <?php
      require_once('navbar_index.php');
    ?>

    <!-- banner part start-->
    <section class="banner_part">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-xl-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                          <?php
                             if(isset($_GET['connexion']))
                             {
                               $err = htmlspecialchars($_GET['connexion']);

                               switch($err)
                               {
                                 case 'patientvrai':
                                 ?>
                                 <div class="alert alert-success">
                                 <center><strong><p><?php echo $_SESSION['prenom'] ?>, vous êtes connecté !</p></strong>
                                 </div>
                                 <?php
                                 break;

                                 case 'adminvrai':
                                 ?>
                                 <div class="alert alert-success">
                                 <center><strong><p><?php echo $_SESSION['prenom'] ?>, vous êtes connecté !</p></strong>
                                 </div>
                                 <?php
                                 break;

                                 case 'medecinvrai':
                                 ?>
                                 <div class="alert alert-success">
                                 <center><strong><p><?php echo $_SESSION['prenom'] ?>, vous êtes connecté !</p></strong>
                                 </div>
                                 <?php
                                 break;
                               }
                             }

                             if(isset($_GET['stmt']))
                             {
                               $succ = htmlspecialchars($_GET['stmt']);

                               switch($succ)
                               {
                                 case 'good':
                                 ?>
                                 <div class="alert alert-success">
                                 <center><strong><p> Mot de passe modifié avec succès !</p></strong>
                                 </div>
                                 <?php
                                 break;
                               }
                             }
                    ?>
                            <h5 style="font-family: Arial, sans-serif">Votre santé, notre priorité</h5>
                            <h1 style="font-family: Arial, sans-serif">Soins &
                                Médecins approuvés</h1>
                            <p style="font-family: Arial, sans-serif">Ne renoncez pas à vos soins : l'hôpital Zoldyck est organisé pour vous accueillir ! L'hôpital Zoldyck  centre son action sur la qualité d’accompagnement des résidents, leur bien-être au quotidien, ainsi que le maintien de leur autonomie et de leur vie sociale.
</p>


                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner_img">
                        <img src="img/banner_img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- about us part start-->
    <section class="about_us padding_top">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 col-lg-6">
                    <div class="about_us_img">
                        <img src="img/top_service.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="about_us_text">
                        <h2 style="font-family: Arial, sans-serif">À propos de nous ?</h2>
                        <p style="color : black;" style="font-family: Arial, sans-serif">

                        L’hôpital Zoldyck est un hôpital public faisant partie de l’Assistance Publique–Hôpitaux de Paris (AP-HP), qui est le Centre Hospitalier Universitaire (CHU) de la région Ile-de-France.</p>
                        <a class="btn_2 " target="_blank" href="views/savoirplus.php">En savoir plus</a>
                        <div class="banner_item">
                            <div class="single_item">
                                <img src="img/icon/banner_1.svg" alt="">
                                <h5 style="font-family: Arial, sans-serif">Urgence</h5>
                            </div>
                            <div class="single_item">
                                <img src="img/icon/banner_2.svg" alt="">
                                <h5 style="font-family: Arial, sans-serif">Rendez-vous</h5>
                            </div>
                            <div class="single_item">
                                <img src="img/icon/banner_3.svg" alt="">
                                <h5 style="font-family: Arial, sans-serif">équipe qualifiée</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about us part end-->

    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2 style="font-family: Arial, sans-serif">Nos principaux services</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 col-sm-12">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="img/icon/feature_2.svg" alt=""></span>
                            <h4 style="font-family: Arial, sans-serif">Médecine interne</h4>
                            <p style="font-family: Arial, sans-serif">- Maladies systémiques: lupus, syndrome de sjögren, sclérodermie, ...
<br/>
 - Maladies infectieuses et tropicales.
<br/>
 - Conseils aux voyageurs.
 <br/>

- Infection par le VIH.
<br/>
- Accident par exposition au sang.
<br/>
- Drépanocytose.</p>
                        </div>
                    </div>
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="img/icon/feature_2.svg" alt=""></span>
                            <h4 style="font-family: Arial, sans-serif">Dérmatologie</h4>
                            <p style="font-family: Arial, sans-serif">- Photothérapie UVB et PUVAthérapie. <br/>

- Prise en charge des plaies chroniques.<br/>
- Interventions chirurgicales cutanées.<br/>
- Photothérapie dynamique.<br/>
- Cancérologie dermatologique.<br/>
- Dépistage de mélanome.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                        <div class="single_feature_img">
                            <img src="img/service.png" alt="">
                        </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="img/icon/feature_2.svg" alt=""></span>
                            <h4 style="font-family: Arial, sans-serif">Gastroentérologie</h4>
                            <p style="font-family: Arial, sans-serif">- Endoscopies digestives: fibroscopies gastriques, coloscopies avec  ablation de polypes, GPE.
                            <br/>
            - Exploration des douleurs abdominales: ulcère, reflux gastro-oesophagien, lithiase vésiculaire, pancréatites...</p>
                        </div>
                    </div>
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="img/icon/feature_2.svg" alt=""></span>
                            <h4 style="font-family: Arial, sans-serif">Rhumatologie</h4>
                            <p style="font-family: Arial, sans-serif">- Rhumatismes inflammatoires (polyarthrite rhumatoïde, spondyloarthrites, rhumatisme psoriasique)<br/>
                              - Arthropathies micro-cristallines ( goutte, chondrocalcinose articulaire)<br/>
  - Infections ostéo- articulaires (arthrites infectieuses et spondylodiscites)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature_part start-->

    <!-- our depertment part start-->
    <section class="our_depertment section_padding">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-12">
                    <div class="depertment_content">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <h2>Services supplémentaires</h2>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single_our_depertment">
                                            <span class="our_depertment_icon"><img src="img/icon/feature_2.svg"
                                                    alt=""></span>
                                            <h4>Pneumologie</h4>
                                            <p style="color:black">La pneumologie désigne la spécialité s’intéressant au fonctionnement de l’appareil respiratoire .</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single_our_depertment">
                                            <span class="our_depertment_icon"><img src="img/icon/feature_2.svg"
                                                    alt=""></span>
                                            <h4>Infection VIH</h4>
                                            <p style="color:black">L'infection par le virus de l'immunodéficience humaine (VIH) est une infection virale et peut aboutir au syndrome de SIDA.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single_our_depertment">
                                            <span class="our_depertment_icon"><img src="img/icon/feature_2.svg"
                                                    alt=""></span>
                                            <h4>Endocrinologie - Diabétologie</h4>
                                            <p style="color:black">L'endocrinologie est la spécialité médicale s'intéressant aux hormones, à leurs effets sur le fonctionnement du corps.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single_our_depertment">
                                            <span class="our_depertment_icon"><img src="img/icon/feature_2.svg"
                                                    alt=""></span>
                                            <h4>Cancérologie - Oncologie</h4>
                                            <p style="color:black">La cancérologie (appelée aussi carcinologie ou oncologie) est la spécialité d'étude, de diagnostic et de traitement des cancers.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our depertment part end-->


<?php
require_once('footer_index.php');
 ?>
</html>
