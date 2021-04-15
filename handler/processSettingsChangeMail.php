<!-- MODIFICATION -->
<?php
    if ($_SERVER['REQUEST_METHOD']==="POST")
        {
            //we verify that the new email match the confirmation email
            if( $_POST["email"] !== $_POST["email_confirmation"])
            {
                $_SESSION["msg_change_email"] = "Les adresse mails ne correspondent pas";
                header("Location: settings");
                exit();    
            }
            else
            {
                //we update the email in the database
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
