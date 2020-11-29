<?php
try{
  $bdd= new PDO('mysql:host=localhost;dbname=hopital; charset=utf8','root','');
}
catch (Exception $e){
  die('Erreur:'.$e->getMessage());
}

session_start();

if (isset($_GET['id']) AND !empty($_GET['id']))  // recup url
{
  $getid = $_GET['id'];
  $select_user_info = $bdd->prepare('SELECT * FROM patient WHERE id = ?');
  $select_user_info->execute(array($getid));
  $whoiam = $select_user_info->fetch();
  if(isset($_POST['ok_modifier_compte'])) {

    $author = $_POST['nom'];
    $content = $_POST['message'];

    // 2. Créer une requête qui permettra d'insérer ces données
    $query = $bdd->prepare('INSERT INTO minichat SET nom = :author, message = :content');

    $query->execute([
      "author" => $author,
      "content" => $content
    ]);
  }
}
 ?>



     <!DOCTYPE html>
 <html>
 	<head>
 		<meta charset="utf-8">
 		<title>Tchat !</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1.0">

 		<!-- MATERIAL DESIGN ICONIC FONT -->
 		<link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

 		<!-- STYLE CSS -->
 		<link rel="stylesheet" href="../css/style3.css">
 	</head>

 	<body>

 		<div class="wrapper">
 			<div class="inner">
 				<form action="" method="post">
          <a href="../page_index.php" style="color: #EB2900;" class="genric-btn danger-border circle arrow">Retour<span
              class="lnr lnr-arrow-right"></span></a><br><br>
 					<h3>Communiquez ici !</h3>
 					<p>Monsieur <strong><?= $whoiam['nom']; ?></strong>, voici quelques règles à respecter : </p>
          <p> 🤬 Les insultes sont interdites. </p>
          <p> 🕵 Les messages sont visibles par les administrateurs. </p>
          <p> 👮 Tout manquement aux règles entrainera des sanctions. </p>
 					<label class="form-group">
 						<input type="text" text-indent: -10000em; name="nom" class="form-control" value="<?= $whoiam['nom']; ?>" >
 						<span>Nom</span>
 						<span class="border"></span>

 					</label>

          <label class="form-group">
 						<input type="text" name="message" class="form-control" value="" required>
<span>Message</span>
 						<span class="border"></span>
 					</label>

 				<center>

        	<button type="submit" name="ok_modifier_compte">Envoyer
</center>
 					</button>
 				</form>
        <br><br>

<?php
$allmsg = $bdd->query('SELECT * FROM minichat ORDER BY id DESC');
while ($msg = $allmsg->fetch()){

 ?>
 <br>
<?php echo $msg['date_message'] ?> - <b><?php echo $msg['nom'] ?> : </b> <?php echo $msg['message'] ?> <br>
<?php
}
?>

 			</div>
 		</div>

 	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
 </html>
