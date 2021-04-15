<!-- MODIFICATION -->
<?php  
if ($_SERVER['REQUEST_METHOD']==="POST")
	{
		//the verify that all the field are filled before sending the query 
		if (isset($_POST['email']) && isset($_POST['password']))
		{
			//we retrieve the row linked to the email
			$stmt =$db->prepare("SELECT * FROM users WHERE email= :email"); 
			$stmt-> execute(['email' => $_POST["email"]]);
			$users = $stmt->fetch();
			//we verify if the password is the same as the crypted one
			$ok = password_verify($_POST["password"], $users["password"]);
			
			//if not we display a message
			if (!$ok)
			{
				$_SESSION["msg_login"] = "Le mot de passe ou l'email est incorrect";
				header("Location: login");	
				exit();
			} 
			else 
			{
				//we keep the email of the user and him to the home page 
				$_SESSION["email"] = $_POST["email"];
				header("Location: home");
				exit();					
			}	
		}
	}
?>
