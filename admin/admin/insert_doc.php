
<!DOCTYPE html>
<html>
    <head>
        <title>Compte Admin</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>

    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-ok"></span> Admin - Ajouter <span class="glyphicon glyphicon-ok"></span></h1>
         <div class="container admin">
            <div class="row">
                <h1><strong>Ajouter un patient</strong></h1>
                <br>
                <form class="form" action="../../traitement/add_doctor.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="ex: Fontaine">
                        <span class="help-inline"><?php echo 'Ce champs ne peut pas être vide';?></span>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Lieu:</label>
                        <input type="text" class="form-control" id="prenom" name="lieu" placeholder="ex: Jean-Paul">
                        <span class="help-inline"><?php echo 'Ce champs ne peut pas être vide';?></span>
                    </div>
                    <div class="form-group">
                        <label for="date_naissance">Spécialité:</label>
                        <input type="text" class="form-control" id="date_naissance" name="specialite" placeholder="Prix" >
                        <span class="help-inline"><?php echo 'Ce champs ne peut pas être vide';?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Mail:</label>
                        <input type="email" class="form-control" id="mail" name="mail" placeholder="ex: exemple@exemple.fr">
                        <span class="help-inline"><?php echo 'Ce champs ne peut pas être vide';?></span>
                    </div>
                    <div class="form-group">
                        <label for="name">Mot de passe:</label>
                        <input type="password" class="form-control" id="mdp" name="mdp" placeholder="ex: MotdePaSse19">
                        <span class="help-inline"><?php echo 'Ce champs ne peut pas être vide';?></span>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <select class="form-control" id="image" name="image">
                        <?php
                        require 'database.php';
                           $db = Database::connect();
                           foreach ($db->query('SELECT * FROM patient') as $row)
                           {
                                echo '<option value="'. $row['image'] .'">'. $row['image'] . '</option>';;
                           }
                           Database::disconnect();
                        ?>
                        </select>

                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                        <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                   </div>
                </form>
            </div>
        </div>
    </body>
</html>
