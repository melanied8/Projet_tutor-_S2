<?php 
//Initialise the session
require('../index.php');
//To update the error indications
$_SESSION["msg_login"] =""; 
$_SESSION["msg"]="";
$verif = false;

if($_SERVER['REQUEST_METHOD']==="POST"){

	$stmt =$db->prepare("SELECT * FROM users WHERE email= :email"); 
	$stmt-> execute(['email' => $_POST["email"]]);
	$users = $stmt->fetch();

	if($users != null){
		$ok = password_verify($_POST["password"], $users["password"]);
		if (!$ok){
			$_SESSION["msg_login"] = "Mot de passe invalide";	
			header("Location: login.php");
			exit();  
		} 
		else {
				//$_SESSION["msg_login"] = "Les informations sont valides";
				$_SESSION["users"] = $users;	
				$_SESSION["email"] = $_POST["email"];
				//header("Location: acceuil.php");
				exit();				
		}
	}
	else{
		$_SESSION["msg_login"] = "Identifiant non existe";	
			header("Location: login.php");
			exit(); 
	}
	
			
}







?>