<!-- MODIFICATION -->
<?php
    if ($_SERVER['REQUEST_METHOD']==="POST")
        {
            //we verify that the fields are filled in 
            if (isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password']))
            {
                // we retrieve the row of the current users 
                $stmt =$db->prepare("SELECT * FROM users WHERE email= :email"); 
                $stmt-> execute(['email' =>$_SESSION["email"]]);
                $users = $stmt->fetch();
                //we verify that the passwords match 
                $ok = password_verify($_POST["current_password"], $users["password"]);
                
                if (!$ok)
                {
                    $_SESSION["msg_change_password"] = "Mauvais mot de passe actuel";
                    header("Location: settings");	
                    exit();
                } 
                else 
                {
                    // we verify that the new passwords match
                    if( $_POST["new_password"] != $_POST["confirm_password"])
                    {
                        $_SESSION["msg_change_password"] = "Nouveau mot de passe et confirmation qui ne correspondent pas";
                        header("Location: settings");	
                        exit();
                    }
                    else
                    {
                        //we update the password
                        $password2_hash = password_hash($_POST["confirm_password"],PASSWORD_BCRYPT);
                        $sql = $db->prepare("UPDATE users SET password='$password2_hash' WHERE email= :email");
                        $sql-> execute(['email' => $_SESSION["email"]]);
                        $_SESSION["msg_change_password"]="Le mot de passe a été réinitialisé."; 
                    
                        header("Location: settings");
                        exit();		
                    }			
                }	
            }
        } 
?>
