<?php
	//Initialise the session
	require('../index.php');
	//To update the error indications
	$_SESSION["msg_register"] =""; 
	$_SESSION["msg"]="";

	$verif = false;

	if ($_SERVER['REQUEST_METHOD']==="POST")
    {
                
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute( [ ':email' => $_POST['email'],]);
        $result  = $stmt-> fetchAll(PDO::FETCH_ASSOC);
        
        if ($result!=null)
        {
            $_SESSION["msg_register"] = " l'email existe déjà";
            //If the login exist, vérif = false
            $verif = false;

            header("Location: register.php");
            exit();    
        }
        else
        {
            //If the login does not exist, the registration is authorised
            $verif = true;

        }
        if ($verif===true)
        {
            if( $_POST["password1"] != $_POST["password"])
            {
                $_SESSION["msg_register"] = "erreur sur le mot de passe";
                header("Location: register.php");
                exit();    
            } else
            {
                //the password is made secure     
                $psswrd_hash = password_hash($_POST["password"],PASSWORD_BCRYPT);
                $psswrd_hash1 = password_hash($_POST["password1"],PASSWORD_BCRYPT);
                
                $request = $db->prepare("INSERT INTO users (email, password)
                VALUES(:email, :password)");

                //the parameters are bind to a specific variable name
                    
                $request->bindParam(':email', $email);
                $request->bindParam(':password', $psswrd_hash);
                    
                $login = $_POST["login"];
                $email = $_POST["email"];
                
                $request->execute();
		    	$_SESSION["msg_register"] = "Nouvel enregistrement créé avec succès";
            }    

            header("Location: login.php");
            exit();        

        }

	}
?>