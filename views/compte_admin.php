<?php
/*session_start();

$bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');

if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1) {
  exit();
}

 ET        -> SECURISER ADMIN

else {
  exit();
} */

$bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root',''); // Connexion à la bdd

if(isset($_GET['type']) AND $_GET['type'] =='membre') {

      if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
        $confirme = (int) $_GET['confirme'];

        $req = $bdd->prepare('UPDATE compte SET confirme = 1 WHERE id = ?');
        $req->execute(array($confirme));
      }

      if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
        $supprime = (int) $_GET['supprime'];

        $req = $bdd->prepare('DELETE FROM compte WHERE id = ?');
        $req->execute(array($supprime));
      }
} elseif (isset($_GET['type']) AND $_GET['type'] =='medecin') {


      if(isset($_GET['approuve']) AND !empty($_GET['approuve'])) {
        $approuver = (int) $_GET['approuve'];

        $req = $bdd->prepare('UPDATE medecin SET approuve = 1 WHERE id = ?');
        $req->execute(array($approuver));
      }

      if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
        $supprime = (int) $_GET['supprime'];

        $req = $bdd->prepare('DELETE FROM medecin WHERE id = ?');
        $req->execute(array($supprime));
      }
}


$membres = $bdd->query('SELECT * FROM compte ORDER BY id DESC'); // ON AFFICHE COMPTE DE LA BDD

$medecin = $bdd->query('SELECT * FROM medecin ORDER BY id DESC'); // ON AFFICHE MEDECIN DE LA BB


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Compte admin</title>
  </head>
  <body>

<ul>
  <?php while ($m = $membres->fetch()) { ?> <!-- AFFICHER LES MEMBRES -->
    <li>  <?= $m['id'] ?>  : <?= $m['nom'] ?><?php if($m['confirme'] == 0) { ?> - <a href="compte_admin.php?type=compte&confirme=<?= $m['id'] ?>">Confirmer</a> <!-- CONFIRMER -->
    <?php } ?> - <a href="compte_admin.php?type=compte&supprime=<?=
    $m['id'] ?>"> Supprimer</a> </li>
<?php } ?>
</ul>
<br><br>

<ul>
  <?php while ($med = $medecin->fetch()) { ?>
    <li>  <?= $med['id'] ?>  : <?= $med['nom'] ?> - <?= $med['specialite'] ?> <?php if($med['approuve'] == 0)
     { ?> - <a href="compte_admin.php?type=medecin&approuve=<?= $med['id'] ?>">Approuver</a> <?php } ?> - <a href="compte_admin.php?type=medecin&approuve=<?=
    $med['id'] ?>"> Supprimer</a> </li>
<?php } ?>
</ul>

<ul>
<?php
                                      $bdd= new PDO('mysql:host=localhost;dbname=hopital;charset=utf8','root','');
                                      $rep=$bdd->query('SELECT * from compte');
                                      $donne=$rep->fetchall(); ?>
                                      <td> <?php
                                      foreach ($donne as $value) { ?> <td> <?php
                                          echo "ID : ".$value['id']." "."NOM : ".$value['nom']." "."Prénom : ".$value['prenom']." "."Date de naissance : ".$value['date_naissance']." "."MAIL : ".$value['mail']." "."Adresse : ".$value['adresse']
                                          .  " "."Mutuelle : ".$value['mutuelle']." "."Numéro de sécurité sociale : ".$value['num_sec_soc']. " "."Option de chambre : ".$value['option_chambre'].    "<br><br>";
                                      } ?> </td> </td>
                                      </p>

                                      </ul>


  </body>
</html>
