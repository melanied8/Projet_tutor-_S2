<?php
session_start();
include('db_connect.php');
$msg =""; 

if($_SERVER['REQUEST_METHOD']==="POST"){

	$stmt =$db->prepare("SELECT * FROM users WHERE email= :email"); 
	$stmt-> execute(['email' => $_POST["email"]]);
	$users = $stmt->fetch();
	$ok = password_verify($_POST["password"], $users["password"]);
	if (!$ok){
		$msg = "Identifiant ou mot de passe invalide";	
	} 
	
	else {
			$_SESSION["users"] = $users;	
			$_SESSION["email"] = $_POST["email"];
			$msg = "les informations sont valides";
			
			header("Location: index.php");
			die();					
	}
			
}

?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<title>Connexion</title>
</head>
<body>
<div class="center-div">
	<div>
	<form action="login.php" method="POST" class="login">
		<label class="label">Adresse e-mail</label> 
		<input class="box-model" type="email" name="email" placeholder="mail@provider.com">
		
		<label class="label">Mot de passe</label>
		<input class="box-model" type="password" name="password" placeholder="password">
		
		<button class="button box-model" type="submit" name="submit">Connexion</button>
		<p><a href="#">J'ai oublié mon mot de passe</a></p>
		<p><a href="./register.html">Pas encore de compte ? Inscrivez-vous !</a></p>
	</form>
	</div>
</div>
</body>
</html>