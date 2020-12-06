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
        $statement = $db->prepare("UPDATE medecin SET approuve = 'non' WHERE id = ?");
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
