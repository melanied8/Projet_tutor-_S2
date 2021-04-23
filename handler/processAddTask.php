<?php
    //get the name of the task from addTask asynchronous js function 
    //$inputJSON = file_get_contents('php://input');
    //$input = json_decode($inputJSON, TRUE); //convert JSON into array
     //we retrieve the id list 
     $idList = $_SESSION["idList"];
     echo ($idList);
       
    //we add the spot to the database
    $request = $db->prepare("INSERT INTO listitems (itemName, idList)
                             VALUES(:itemName, :idList)");
    
    //the parameters are bind to a specific variable name
    //$description = $input;
      
    $itemName = $_POST["itemName"];
    $request->bindParam(':itemName', $itemName);
    $request->bindParam(':idList', $idList);
    $request->execute();

    header("Location: home");
    exit(); 
  
?>

