<!-- MODIFICATION -->
<?php
    if ($_SERVER['REQUEST_METHOD']==="POST")
        {
            //we verify that the fields are filled in 
            if (!isset($_POST["new_password"]) || !isset($_POST["new_password"]))
            {
                header("Location: updatePassword");
                exit(); 
            }
            else 
            {
                //we verify that the passwords match
                if( $_POST["new_password"] != $_POST["confirm_password"])
                {
                    $_SESSION["msg_new_password"] = "Les mots de passe ne correspondent pas.";
                    header("Location: updatePassword");
                    exit();    
                }
                else
                {
                    //we update the password 
                    $password2_hash = password_hash($_POST["confirm_password"],PASSWORD_BCRYPT);
                    $sql = $db->prepare("UPDATE users SET password='$password2_hash' WHERE email= :email");
                    $sql-> execute(['email' => $_SESSION["email"]]);
                
                    header("Location: login");
                    exit();	
                }
            }
        }
?>
