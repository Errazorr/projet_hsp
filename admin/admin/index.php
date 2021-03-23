<?php
// INDEX DE LA PAGE ADMIN
session_start();

//SI ADMIN
  if ($_SESSION['role'] == "admin") {
    //SELECTION DANS LA BDD

 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Espace Admin</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>

    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-folder-open"></span> Espace Admin <span class="glyphicon glyphicon-folder-open"></span></h1>
        <div class="container admin">

            <div class="row">
              <?php
              //MESSAGES D'ERREUR LORS DE LA CONNEXION
                 if(isset($_GET['add_err']))
                 {
                   $err = htmlspecialchars($_GET['add_err']);

                   switch($err)
                   {
                     case 'patient':
                     ?>
                     <div class="alert alert-danger">
                     <center><p style="color: red;"> Ce compte patient existe déjà !</p>
                     </div>
                     <?php
                     break;

                     case 'admin':
                     ?>
                     <div class="alert alert-danger">
                     <center><p style="color: red;"> Ce compte admin existe déjà !</p>
                     </div>
                     <?php
                     break;

                     case 'medecin':
                     ?>
                     <div class="alert alert-danger">
                     <center><p style="color: red;"> Ce compte médecin existe déjà !</p>
                     </div>
                     <?php
                     break;
    }
    }
                     ?>
                <a class="btn btn-primary" href="../../index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour à l'accueil</a>
                <h1><strong>Liste des patients   </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a> <?php echo ' '; ?> <a href="../../traitement/csv2.php" target="_blank" style="background-color: #858383; border-color: #FFF;"class="btn btn-success btn-lg"><span class="glyphicon glyphicon-download-alt"></span> Exporter</a></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="text-align: center;">Id</th>
                      <th style="text-align: center;">Nom</th>
                      <th style="text-align: center;">Prénom</th>
                      <th style="text-align: center;">Numéro de sécurité sociale</th>
                      <th style="text-align: center;">Confirmé</th>
                      <th style="text-align: center;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT * FROM patient  ORDER BY id DESC');
                        while($item = $statement->fetch())
                        {
                            echo '<tr align="center">';
                            echo '<td>'. $item['id'] . '</td>';
                            echo '<td>'. $item['nom'] . '</td>';
                            echo '<td>'. $item['prenom'] . '</td>';
                            echo '<td>'. $item['num_sec_soc'] . '</td>';
                            echo '<td>'. $item['confirme'] . '</td>';
                            echo '<td width=300>';
                            echo '<a class="btn btn-default" href="view.php?id='.$item['id'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                            echo ' ';

                              echo '<a class="btn btn-primary" href="update.php?id='.$item['id'].'"> Ban/Valider</a>';
                              echo ' ';

                            echo '<a class="btn btn-danger" href="delete.php?id='.$item['id'].'"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
<br><br><br>
        <div class="container admin">
            <div class="row">
                <a class="btn btn-primary" href="../../index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour à l'accueil</a>
                <h1><strong>Liste des médecins   </strong><a href="insert_doc.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
                <table class="table table-striped table-bordered"><br>
                  <thead>
                    <tr>
                      <th style="text-align: center;">Id</th>
                      <th style="text-align: center;">Nom</th>
                      <th style="text-align: center;">Lieu</th>
                      <th style="text-align: center;">Spécialité</th>
                      <th style="text-align: center;">Confirmé</th>
                      <th style="text-align: center;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php

                        $db = Database::connect();
                        $statement = $db->query('SELECT * FROM medecin  ORDER BY id DESC');
                        while($item = $statement->fetch())
                        {
                          echo '<tr align="center">';
                          echo '<td>'. $item['id'] . '</td>';
                          echo '<td>'. $item['nom'] . '</td>';
                          echo '<td>'. $item['lieu'] . '</td>';
                          echo '<td>'. $item['specialite'] . '</td>';
                          echo '<td>'. $item['approuve'] . '</td>';
                          echo '<td width=300>';
                          echo '<a class="btn btn-default" href="view_doc.php?id='.$item['id'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                          echo ' ';

                            echo '<a class="btn btn-primary" href="update_doc.php?id='.$item['id'].'"> Ban/Valider</a>';
                            echo ' ';

                          echo '<a class="btn btn-danger" href="delete_doc.php?id='.$item['id'].'"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                          echo '</td>';
                          echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
            </div>
        </div><br><br>

        <br><br>

                <div class="container admin">
                    <div class="row">
                        <a class="btn btn-primary" href="../../index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour à l'accueil</a>
                        <h1><strong>Liste des administrateurs   </strong><a href="insert_admin.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1> <br>
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th style="text-align: center;">Id</th>
                              <th style="text-align: center;">Nom</th>
                              <th style="text-align: center;">Prénom</th>
                              <th style="text-align: center;">Mail</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php

                                $db = Database::connect();
                                $statement = $db->query('SELECT * FROM admin  ORDER BY id DESC');
                                while($item = $statement->fetch())
                                {
                                  echo '<tr align="center">';
                                  echo '<td>'. $item['id'] . '</td>';
                                  echo '<td>'. $item['nom'] . '</td>';
                                  echo '<td>'. $item['prenom'] . '</td>';
                                  echo '<td>'. $item['mail'] . '</td>';

                                  echo '</td>';
                                  echo '</tr>';
                                }
                                Database::disconnect();
                              ?>
                          </tbody>
                        </table>
                    </div>
                </div><br><br>
<br>

        <br>
                <div class="container admin">
                    <div class="row">
                        <a class="btn btn-primary" href="../../index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour à l'accueil</a>
                        <h1><strong>Liste des rendez-vous   </strong><a href="../../traitement/csv.php" style="background-color: #858383; border-color: #FFF;"class="btn btn-success btn-lg"><span class="glyphicon glyphicon-download-alt"></span> Exporter</a></h1>
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th style="text-align: center;">Id</th>
                              <th style="text-align: center;">Patient</th>
                              <th style="text-align: center;">Médecin</th>
                              <th style="text-align: center;">Date</th>
                              <th style="text-align: center;">Heure</th>
                              <th style="text-align: center;">Raison</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php

                                $db = Database::connect();
                                $statement = $db->query('SELECT * FROM reservation  ORDER BY id DESC');
                                while($item = $statement->fetch())
                                {
                                  echo '<tr align="center">';
                                  echo '<td>'. $item['id'] . '</td>';
                                  echo '<td>'. $item['nom_patient'] . '</td>';
                                  echo '<td>'. $item['nom_medecin'] . '</td>';
                                  echo '<td>'. $item['date_consult'] . '</td>';
                                  echo '<td>'. $item['time_consult'] . '</td>';
                                  echo '<td>'. $item['rais_consult'] . '</td>';
                                  echo '</td>';
                                  echo '</tr>';
                                }
                                Database::disconnect();
                              ?>
                          </tbody>
                        </table>
                    </div>
                </div><br><br>
    </body>

</html>
<?php
}
//SI PAS ADMIN
else{
  //PAS D'ACCES
  echo 'Vous n\'avez pas accès à cette page';
}

?>
