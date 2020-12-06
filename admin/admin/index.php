<?php

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
                <a class="btn btn-primary" href="../../page_index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour à l'accueil</a>
                <h1><strong>Liste des patients   </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nom</th>
                      <th>Prénom</th>
                      <th>Numéro de sécurité sociale</th>
                      <th>Confirmé</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT * FROM patient  ORDER BY id DESC');
                        while($item = $statement->fetch())
                        {
                            echo '<tr>';
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
                <a class="btn btn-primary" href="../../page_index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour à l'accueil</a>
                <h1><strong>Liste des médecins   </strong><a href="insert_doc.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
                <table class="table table-striped table-bordered"><br>
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nom</th>
                      <th>Lieu</th>
                      <th>Spécialité</th>
                      <th>Confirmé</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php

                        $db = Database::connect();
                        $statement = $db->query('SELECT * FROM medecin  ORDER BY id DESC');
                        while($item = $statement->fetch())
                        {
                          echo '<tr>';
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
