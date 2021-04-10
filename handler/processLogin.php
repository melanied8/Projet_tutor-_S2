<?php
    
if ($_SERVER['REQUEST_METHOD']==="POST")
	{
		if (isset($_POST['email']) && isset($_POST['password']))
		{
			$stmt =$db->prepare("SELECT * FROM users WHERE email= :email"); 
			$stmt-> execute(['email' => $_POST["email"]]);
			$users = $stmt->fetch();
			$ok = password_verify($_POST["password"], $users["password"]);
			
			if (!$ok)
			{
				$_SESSION["msg"] = "Le mot de passe ou l'email est incorrect";
				header("Location: login");	
				exit();
			} 
			else 
			{
				$_SESSION["users"] = $users;	
				$_SESSION["email"] = $_POST["email"];
				$_SESSION["msg"] = "les informations sont valides";
				header("Location: home");
				exit();					
			}	
		}
	}
?>
