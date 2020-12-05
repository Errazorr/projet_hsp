<?php
    require 'database.php';

    if(!empty($_GET['id']))
    {
        $id = checkInput($_GET['id']);
    }

    if(!empty($_POST))
    {

        $err = htmlspecialchars($_GET['password_err']);
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("UPDATE patient SET confirme = 'oui' WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php");

  }

    function checkInput($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Burger Code</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>

<?php
  $db = Database::connect();
$id = $_GET['id'];
$req = $db->prepare('SELECT * FROM patient WHERE id=? ');
$req->execute(array($id));
$email_verification = $req->fetch();

  if($email_verification['confirme'] == 'oui'){
 ?>
 <body>
     <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
      <div class="container admin">
         <div class="row">
             <h1><strong>Bannir le compte</strong></h1>
             <br>
             <form class="form" action="update2.php" role="form" method="post">
                 <input type="hidden" name="id" value="<?php echo $id;?>"/>
                 <p class="alert alert-warning">Ce compte est déjà confirmé. Voulez-vous bannir ce compte ?</p>
                 <div class="form-actions">
                   <button type="submit" class="btn btn-warning">Oui</button>
                   <a class="btn btn-default" href="index.php">Non</a>
                 </div>
             </form>
         </div>
     </div>
 </body>
<?php } elseif($email_verification['confirme'] != 'oui') { ?>

    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
            <div class="row">
                <h1><strong>Confirmer le compte</strong></h1>
                <br>
                <form class="form" action="update.php" role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <p class="alert alert-warning">Ce compte est banni. Désirez-vous le confirmer et le rendre à nouveau utilisable ?</p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-warning">Oui</button>
                      <a class="btn btn-default" href="index.php">Non</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
  <?php } ?>
</html>
