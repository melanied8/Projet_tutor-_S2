<?php
    require_once('../db_connect.php');
    //get the name of the task from addTask asynchronous js function 
    $dataJSON = file_get_contents('php://input');
    $data = json_decode($dataJSON, TRUE); //convert JSON into array


    
    
    //we retrieve the id list 
    $idList = $data['id'];          
    //we add the spot to the database
    $request = $db->prepare("INSERT INTO listitems (itemName, idList)
                             VALUES(:itemName, :idList)");
    
    //the parameters are bind to a specific variable name
    $description = $data['input'];
    $request->bindParam(':itemName', $description);
    $request->bindParam(':idList', $idList);
    $request->execute();

    exit(); 
  
?>

