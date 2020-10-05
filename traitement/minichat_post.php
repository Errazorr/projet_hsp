<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=hopital;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (nom, message) VALUES(?, ?)');
$req->execute(array($_POST['nom'], $_POST['message']));

// Redirection du visiteur vers la page du minichat
header('Location: ../views/minichat.php');
?>
