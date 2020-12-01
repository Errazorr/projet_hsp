<?php

    $array = array("firstname" => "", "name" => "", "email" => "", "phone" => "", "message" => "", "firstnameError" => "", "nameError" => "", "emailError" => "", "phoneError" => "", "messageError" => "", "isSuccess" => false);
    $emailTo = $_POST['email'];

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $array["firstname"] = test_input($_POST["firstname"]);
        $array["name"] = test_input($_POST["name"]);
        $array["email"] = test_input($_POST["email"]);
        $array["phone"] = test_input($_POST["phone"]);
        $array["message"] = test_input($_POST["message"]);
        $array["isSuccess"] = true;
        $emailText = "";

        if (empty($array["firstname"]))
        {
            $array["firstnameError"] = "Entrez votre prénom";
            $array["isSuccess"] = false;
        }
        else
        {

        }

        if (empty($array["name"]))
        {
            $array["nameError"] = "Entrez votre nom";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Monsieur {$array['name']},\n";
        }

        if(!isEmail($array["email"]))
        {
            $array["emailError"] = "Entrez votre mail";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Vous nous avez contacté sur notre formulaire. \n";
        }

        if (!isPhone($array["phone"]))
        {
            $array["phoneError"] = "N'entrez que des chiffres";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Nous vous repondrons au : {$array['phone']} ou par mail : {$array['email']}\n";
        }

        if (empty($array["message"]))
        {
            $array["messageError"] = "Quel est votre message ?";
            $array["isSuccess"] = false;
        }
        else
        {
            $emailText .= "Votre message : {$array['message']}\n";
        }

        if($array["isSuccess"])
        {
            $headers = "From: {$array['firstname']} {$array['name']} <{$array['email']}>\r\nReply-To: {$array['email']}";
            mail($emailTo, "Hopital - Nous avons recu votre message.", $emailText, $headers);
        }

        echo json_encode($array);

    }

    function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    function isPhone($phone)
    {
        return preg_match("/^[0-9 ]*$/",$phone);
    }
    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>
