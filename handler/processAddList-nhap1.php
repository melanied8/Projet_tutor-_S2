<?php
	//Initialise the session
	//require('../index.php');
	//To remove the notices
	error_reporting(E_ALL ^ E_NOTICE);
	//To update the error indications
	$_SESSION["msg"]="";

	if ($_SERVER['REQUEST_METHOD']==="POST"){

		//Chercher Id de utilisateur dans table users
		$stmt =$db->prepare("SELECT id FROM users WHERE email= :email"); 
		$stmt-> execute(['email' => $_SESSION["email"]]);
		$usersId = $stmt-> fetchAll(PDO::FETCH_ASSOC);
		foreach($usersId as $row) {
			$ID = $row["id"];
			//echo "id cua nguoi dung: " . $ID."<br/>"; =>> vérifié le id de utilisateur
		}
		//echo "id cua nguoi dung lan 2 la: " . $ID."<br/>"; =>> vérifié le id de utilisateur

		//insert into nouveau List dans la table List sur mySQL
		$request = $db->prepare("INSERT INTO list (name, id) VALUES (:name, :id)");
                    //the parameters are bind to a specific variable name
					$name = $_POST["NomList"];
                    $request->bindParam(':name', $name);
                    $request->bindParam(':id', $ID);
		$request -> execute();
		
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
		<title>Accueil</title>
		<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	  	/>
	</head>

	<body>
	<form action="processAddList-nhap1" method="POST" class="#">
		<label>Nom de List</label> 
		<input type="text" name="NomList">
		<button class="button box-model pink" type="submit">Créer nouvelle List</button>
	</form>
	<a href="home2.php">Retour home</a>
	</body>
</html>

 