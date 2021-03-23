<!doctype html>
<html lang="en">

<!-- Test de connexion a la bdd -->
<?php
require_once('navbar.php');// ON APPELLE NAVBAR

try{
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','nathan','oskour');//Connexion BDD
}
catch (Exception $e){
  die('Erreur:'.$e->getMessage());
}

//Sélection de l'ensemble des informations de la table compte en fonction de l'id //
switch ($_SESSION['role']){
  case "patient":
    $rec = $bdd->prepare('SELECT * FROM patient WHERE id=?'); //REQUETE AFFICHAGE
    $rec->execute(array($_SESSION['id'])); //EXECUTION SOUS FORME DE TABLEAU LA REQUETE EN FONCTION LA SESSION EN COURS AVEC ID
    $donnees= $rec->fetch(); //ON RETOURNE LE RESULTAT DANS donnees
    break; // ON STOP
  case "medecin":
    $rec = $bdd->prepare('SELECT * FROM medecin WHERE id=?'); //REQUETE AFFICHAGE
    $rec->execute(array($_SESSION['id'])); //EXECUTION SOUS FORME DE TABLEAU LA REQUETE EN FONCTION LA SESSION EN COURS AVEC ID
    $donnees= $rec->fetch(); //ON RETOURNE LE RESULTAT DANS donnees
    break; // ON STOP
  case "admin":
    $rec = $bdd->prepare('SELECT * FROM admin WHERE id=?'); //REQUETE AFFICHAGE
    $rec->execute(array($_SESSION['id'])); //EXECUTION SOUS FORME DE TABLEAU LA REQUETE EN FONCTION LA SESSION EN COURS AVEC ID
    $donnees= $rec->fetch(); //ON RETOURNE LE RESULTAT DANS donnees
    break; // ON STOP
  }

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title style="font-family: Arial, sans-serif">Modification du profil</title>
    <link rel="icon" href="../img/logo3icon.png">

     <!-- breadcrumb start-->
     <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2 style="font-family: Arial, sans-serif">Modification</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-12">

                   <div class="regervation_part_iner">
                        <form action="../traitement/modification.php" method="post">
                          <center>

                           <h2 style="font-family: Arial, sans-serif">Vous désirez changer vos données? </h2> </center>
                            <div class="form-row">
                              <?php
                                switch ($_SESSION['role']){ //CHOIX MULTIPLE EN FONCTION DE LA SESSION QUI CORRESPOND A ROLE DANS LA BDD
                                  case "patient": // DANS LE CAS DU ROLE PATIENT
                                ?>

                                <div class="form-group col-md-6">
                                  <center><label style="color: blue;"for="nom">Nom :</label>
                                    <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="nom" placeholder="Votre nom : " <?php echo 'value='.'"'.$donnees["nom"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                <center>  <label style="color: blue;"for="prenom">Prénom :</label>
                                    <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="prenom" placeholder="Votre prénom : " <?php echo 'value='.'"'.$donnees["prenom"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                <center>  <label style="color: blue;"for="date_naissance">Date de naissance :</label>
                                    <input style="font-family: Arial, sans-serif" type="date" class="form-control" name="date_naissance" placeholder="Votre date de naissance : " <?php echo 'value='.'"'.$donnees["date_naissance"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                <center>  <label style="color: blue;"for="adresse">Adresse :</label>
                                    <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="adresse" placeholder="Votre adresse : " <?php echo 'value='.'"'.$donnees["adresse"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                <center>  <label style="color: blue;"for="mutuelle">Mutuelle :</label>
                                    <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="mutuelle" placeholder="Votre mutuelle : " <?php echo 'value='.'"'.$donnees["mutuelle"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                <center>  <label style="color: blue;"for="num_sec_soc">Numéro de sécurité sociale :</label>
                                    <input style="font-family: Arial, sans-serif" type="tel" class="form-control" name="num_sec_soc"   maxlength="15" placeholder="Votre numéro de sécurité sociale : " <?php echo 'value='.'"'.$donnees["num_sec_soc"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                <center>  <label style="color: blue;"for="option_chambre">Option :</label>
                                    <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="option_chambre" placeholder="Vos options de chambre (Wifi et/ou TV) : " maxlength="10" <?php echo 'value='.'"'.$donnees["option_chambre"].'"'.''?>>
                                </div>
                                <div class="form-group col-md-6">
                                <center>  <label style="color: blue;"for="regime">Régime :</label>
                                    <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="regime" placeholder="Votre régime : " <?php echo 'value='.'"'.$donnees["regime"].'"'.''?>>
                                </div>
                                <?php
                                ;
                                break; // ON STOP
                                  case "medecin": // DANS LE CAS DU ROLE PATIENT
                                  ?>
                                  <div class="form-group col-md-6">
                                      <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="nom" placeholder="Votre nom : " <?php echo 'value='.'"'.$donnees["nom"].'"'.''?>>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="lieu" placeholder="Votre lieu de travail : " <?php echo 'value='.'"'.$donnees["lieu"].'"'.''?>>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="specialite" placeholder="Votre spécialité : " <?php echo 'value='.'"'.$donnees["specialite"].'"'.''?>>
                                  </div>
                                  <?php
                                    ;
                                    break; // ON STOP
                                    case "admin": // DANS LE CAS DU ROLE ADMIN
                                  ?>
                                  <div class="form-group col-md-6">
                                      <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="nom" placeholder="Votre nom : " <?php echo 'value='.'"'.$donnees["nom"].'"'.''?>>
                                  </div>
                                  <div class="form-group col-md-6">
                                      <input style="font-family: Arial, sans-serif" type="name" class="form-control" name="prenom" placeholder="Votre prénom : " <?php echo 'value='.'"'.$donnees["prenom"].'"'.''?>>
                                  </div>
                                  <?php
                                  ;
                                break;} //ON STOP
                                   ?>
<br/>
  </br/>

                            </div>
                            <div class="regerv_btn"><center>


                                <input type="submit" class="btn_1" name="btn" value="Modifier son compte" style="font-family: Arial, sans-serif">
                                <br/>  </center>

                              </br/>		<center>
<br/>

</br/>

                            </div>


                        </form>
                    </div>

                </div>

            </div>
<?php
$id = $_SESSION['id']; //ON STOCK LA SESSION ACTUELLE DANS LA VARIABLE id
$reqq = $bdd->prepare('SELECT count(*) as numberId FROM admin WHERE id=?'); //ON STOCK LA REQUETE DANS LA VARIABLE reqq
$reqq->execute(array($id)); //ON EXECUTE LA REQUETE
$num_verification = $reqq->fetch();//ON STOCK LE RETOUR DU RESULTAT DANS $num_verification

if($num_verification['numberId'] == 1) { //SI LE RESULTAT VAUT 1
 ?>
<center><a style="color: white;"href="reset_mdp.php?id=<?php echo $id ?>"> > Modifier mon mot de passe < </a>
        </div>

      <?php } elseif($_SESSION['role'] == 'patient') { //SINON SI LE ROLE DE LA SESSION CORRESPOND A PATIENT

      $id = $_SESSION['id'];
      $reqq = $bdd->prepare('SELECT count(*) as numberId FROM patient WHERE id=?');
      $reqq->execute(array($id));
      $num_verification = $reqq->fetch();

      if($num_verification['numberId'] == 1) {
       ?>
      <center><a style="color: white;"href="reset_mdp.php?id=<?php echo $id ?>"> > Modifier mon mot de passe < </a>
              </div>
            <?php } else { echo 'Erreur'; }
          }
          if($_SESSION['role'] == 'medecin') {
            $id = $_SESSION['id'];
            $reqq = $bdd->prepare('SELECT count(*) as numberId FROM medecin WHERE id=?');
            $reqq->execute(array($id));
            $num_verification = $reqq->fetch();

            if($num_verification['numberId'] == 1) {
             ?>
            <center><a style="color: white;"href="reset_mdp.php?id=<?php echo $id ?>"> > Modifier mon mot de passe < </a>
                    </div>
                  <?php }
                } ?>
    </section>
    <!--::regervation_part end::-->
    <?php
    require_once('footer.php');
     ?>

</html>
