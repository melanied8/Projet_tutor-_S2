<?php
    
    //Initialise the session
    require('../index.php');
    //To remove the notices
    error_reporting(E_ALL ^ E_NOTICE);

    //get the name of the task from addTask asynchronous js function 
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE); //convert JSON into array
    
    //var_dump($input);
    
    //on récupère l'id de la liste
    $idList = $_GET['id'];            
    //on ajoute le nom de la liste à la base de donnée
    $request = $db->prepare("INSERT INTO listitems (description, deadline, idList)
                             VALUES(:description, :deadline, :idList)");
    
    //the parameters are bind to a specific variable name
    $description = $input;
    $date = "12/04/2021";
    $request->bindParam(':description', $description);
    $request->bindParam(':deadline', $date);
    $request->bindParam(':idList', $idList);
    $request->execute();

    $_SESSION["msg_addList"] = "Nouvelle tache a été ajoutée avec succés";

    header("Location: home");
    exit(); 
  
?>