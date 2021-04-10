<?php

	//To remove the notices
	error_reporting(E_ALL ^ E_NOTICE);
	//To update the error indications

    if ($_SERVER['REQUEST_METHOD']==="POST")
        {
            if (isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password']))
            {
                $stmt =$db->prepare("SELECT * FROM users WHERE email= :email"); 
                $stmt-> execute(['email' =>$_SESSION["email"]]);
                $users = $stmt->fetch();
                $ok = password_verify($_POST["current_password"], $users["password"]);
                
                if (!$ok)
                {
                    $_SESSION["msg_change_password"] = "Mauvais mot de passe actuel";
                    header("Location: settings.php");	
                    exit();
                } 
                else 
                {
                    if( $_POST["new_password"] != $_POST["confirm_password"])
                    {
                        $_SESSION["msg_change_password"] = "Nouveau mot de passe et confirmation qui ne correspondent pas";
                        header("Location: settings.php");	
                        exit();
                    }
                    else
                    {
                        $password2_hash = password_hash($_POST["confirm_password"],PASSWORD_BCRYPT);
                        $sql = $db->prepare("UPDATE users SET password='$password2_hash' WHERE email= :email");
                        $sql-> execute(['email' => $_SESSION["email"]]);
                        $_SESSION["msg_change_password"]="Le mot de passe a été réinitialisé."; 
                    
                        header("Location: settings.php");
                        exit();		
                    }			
                }	
            }
        } 
?>
