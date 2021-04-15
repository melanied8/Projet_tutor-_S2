<?php
    if ($_SERVER['REQUEST_METHOD']==="POST")
        {
            //we check that the field is not empty 
            if (empty($_POST['email'])) {
                $_SESSION["msg_reset"]="Veuillez saisir une adresse e-mail.";
                header("Location: forgottenPassword");
                exit();
            }
            else
            {   
                //we try and retrieve the email from the dataBase
                $stmt =$db->prepare("SELECT * FROM users WHERE email= :email"); 
                $stmt-> execute(['email' => $_POST["email"]]);
                $users = $stmt->fetch();

                //if it doesn't exist we display a message
                if ($users==NULL)
                {
                    $_SESSION["msg_reset"]="L'adresse mail n'existe pas.";
                    header("Location: forgottenPassword");
                    exit();	
                }
                else
                {
                    // the function to send an email doesn't work  
                    //there is no link between updatePassword.php and forgotPassword.php
                        /* ini_set( 'display_errors', 1);
                            error_reporting( E_ALL );
                            $from = "email.ptut@gmail.com";
                            $to = $_POST['email'];
                            $subject = "Vérification PHP Mail";
                            $message = "PHP mail marche";
                            $headers = "From:" . $from;
                            mail($to,$subject,$message, $headers);
                            $_SESSION["msg_reset"]="L'email a été envoyé.";*/

                    //For now the user is directly sent to de updatePassword page 
                    $_SESSION["email"] =  $_POST["email"];
                    header("Location: updatePassword");
                    exit();	
                }
            }
        } 
?>
 
