
<?php
	//To remove the notices
	error_reporting(E_ALL ^ E_NOTICE);
	//To update the error indications
	$_SESSION["msg"]="";


$verif = false;

if ($_SERVER['REQUEST_METHOD']==="POST")
{
	if (isset($_POST['listName']) )
	{  
			//on réccupère l'id qui correspond à la session ouverte 
			$email_id = $_SESSION["email"];
			$sql = $db->prepare("SELECT id FROM users WHERE email=? LIMIT 1");
			$sql->execute([$email_id]);
			$usersId = $sql-> fetchAll(PDO::FETCH_ASSOC);
			foreach($usersId as $row) {
			$id = $row["id"];

			//on verifie que le nom de la liste existe pas déjà 
			$stmt = $db->prepare("SELECT * FROM list WHERE name = :name AND id = :id");
			$stmt->execute( [ 'name' => $_POST['listName'], 'id'=> $id]);
			$result  = $stmt-> fetchAll(PDO::FETCH_ASSOC);
		
		if ($result!=null)
		{
			$_SESSION["msg_addList"] = " la list existe déjà";
			//If the login exist, vérif = false
			$verif = false;

			header("Location: login");
			exit();    
		}
		else {
			$verif = true;
		}
		if ($verif===true)
		{
		}

			//on ajoute le nom de la liste à la base de donnée
			$request = $db->prepare("INSERT INTO list (name, id)
				VALUES(:name, :id)");

				//the parameters are bind to a specific variable name
				$name = $_POST['listName'];
				$request->bindParam(':name', $name);
				$request->bindParam(':id', $id);
				$request->execute();
				$_SESSION["msg_addList"] = "Nouvelle liste ajouté avec succés";
				header("Location: home");
				exit();   
		} 

	}
}
?>
