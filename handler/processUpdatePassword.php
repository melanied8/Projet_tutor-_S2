<?php
    //Initialise the session
    //require('../index.php');
    //To remove the notices
    $_SESSION["msg_reset"]="";


    if ($_SERVER['REQUEST_METHOD']==="POST")
        {
            if (!isset($_POST["new_password"]) || !isset($_POST["new_password"]))
            {
                header("Location: updatePassword");
                exit(); 
            }
            else 
            {
                if( $_POST["new_password"] != $_POST["confirm_password"])
                {
                    $_SESSION["msg_reset"] = "Les mots de passe ne correspondent pas.";
                    header("Location: updatePassword");
                    exit();    
                }
                else
                {
                    $password2_hash = password_hash($_POST["confirm_password"],PASSWORD_BCRYPT);
                    $sql = $db->prepare("UPDATE users SET password='$password2_hash' WHERE email= :email");
                    $sql-> execute(['email' => $_SESSION["email"]]);
                    $_SESSION["msg_reset"]="Le mot de passe a été réinitialisé."; 
                
                    header("Location:  updatePassword");
                    exit();	
                }
            }
        }
?>