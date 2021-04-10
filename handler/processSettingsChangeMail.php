<?php
	//Initialise the session
	//require('../index.php');
	//To remove the notices
	error_reporting(E_ALL ^ E_NOTICE);
	//To update the error indications

    if ($_SERVER['REQUEST_METHOD']==="POST")
        {
            if( $_POST["email"] !== $_POST["email_confirmation"])
            {
                $_SESSION["msg_change_email"] = "Adresse e-mail invalide";
                header("Location: settings");
                exit();    
            }
            else
            {
                $email = $_POST["email_confirmation"];
                $sql = $db->prepare("UPDATE users SET email='$email' WHERE email= :email");
                $sql-> execute(['email' =>$_SESSION["email"]]);
                $_SESSION["msg_change_email"]="L'adresse a été mise à jour.";   
                $_SESSION["email"] = $_POST["email_confirmation"];
            }    
            header("Location: settings");
            exit();	
        } 
?>