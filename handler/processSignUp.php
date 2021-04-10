<?php
	
    //$_SESSION["msg_register"] = "";
	$verif = false;

	if ($_SERVER['REQUEST_METHOD']==="POST")
    {
       // header("Location: signUp.php");
        //exit();
        //$_SESSION["msg_register"] = "";

        if (isset($_POST['email']) && isset($_POST['confirm_password']) &&  isset($_POST['password']) )
		{                 
            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute( [ ':email' => $_POST['email'],]);
            $result  = $stmt-> fetchAll(PDO::FETCH_ASSOC);
            
            if ($result!=null)
            {
                $_SESSION["msg_register"] = " l'email existe déjà";
                //If the login exist, vérif = false
                $verif = false;

                header("Location: signUp");
                exit();    
            }
            else
            {
                //If the login does not exist, the registration is authorised
                $verif = true;

            }
            if ($verif===true)
            {
                if( $_POST["confirm_password"] != $_POST["password"])
                {
                    $_SESSION["msg_register"] = "erreur sur le mot de passe";
                    header("Location: signUp");
                    exit();    
                } else
                {
                    //the password is made secure     
                    $psswrd_hash = password_hash($_POST["confirm_password"],PASSWORD_BCRYPT);
                    
                    $request = $db->prepare("INSERT INTO users (email, password)
                    VALUES(:email, :confirm_password)");

                    //the parameters are bind to a specific variable name
                        
                    $request->bindParam(':email', $email);
                    $request->bindParam(':confirm_password', $psswrd_hash);
                            
                    // $login = $_POST["login"];
                    $email = $_POST["email"];
                    
                    $request->execute();
                    $_SESSION["msg_register"] = "Nouvel enregistrement créé avec succès";
                }    

                header("Location: login");
                exit();        

            }
        }

	}
?>
