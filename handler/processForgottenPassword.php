<?php
    //To remove the notices
    $_SESSION["msg_reset"]="";


    if ($_SERVER['REQUEST_METHOD']==="POST")
        {
            if (empty($_POST['email'])) {
                $_SESSION["msg_reset"]="Veuillez saisir une adresse e-mail.";
                header("Location: forgottenPassword.php");
                exit();
            }
            else
            {   
                $stmt =$db->prepare("SELECT * FROM users WHERE email= :email"); 
                $stmt-> execute(['email' => $_POST["email"]]);
                $users = $stmt->fetch();

                if ($users===NULL)
                {
                    $_SESSION["msg_reset"]="L'adresse mail n'existe pas.";
                    header("Location: forgottenPassword.php");
                    exit();	
                }
                else
                {
                    // la fonction d'envoie d'email ne fonctionne pas 
                    // il n'y pas encore de lien entre updatePassword et forgotPassword
                    ini_set( 'display_errors', 1);
                    error_reporting( E_ALL );
                    $from = "email.ptut@gmail.com";
                    $to = $_POST['email'];
                    $subject = "Vérification PHP Mail";
                    $message = "PHP mail marche";
                    $headers = "From:" . $from;
                    mail($to,$subject,$message, $headers);
                    $_SESSION["msg_reset"]="L'email a été envoyé.";
                    header("Location: forgottenPassword.php");
                    exit();	
                }
            }
        } 
?>
 
