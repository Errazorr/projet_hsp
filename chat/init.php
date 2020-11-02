<?php
	header('Content-Type:text/html;charset=utf-8');

	// BDD
	define('BDD_USER', 'root');
	define('BDD_PWD', '');
	define('BDD_SERVER', '');
	define('BDD_NAME', 'hopital');

	// Infos site
	define('URL_SITE', 'http://localhost/projet_hsp/projet_hsp/chat/');
	define('URL_MEDIA', 'http://localhost/projet_hsp/projet_hsp/images/');
	define('URL_PROFIL', 'https://www.google.fr/?q=');
	define('PATH_SITE', '../projet_hsp/projet_hsp/chat/');

	// Connexion BDD
	$db = new PDO('mysql:host=localhost;dbname=hopital;charset=utf8mb4', 'root', '');

	// Session
	session_start();
?>
