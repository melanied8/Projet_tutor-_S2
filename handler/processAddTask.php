<?php
    //get the name of the task from addTask asynchronous js function 
    //$inputJSON = file_get_contents('php://input');
    //$input = json_decode($inputJSON, TRUE); //convert JSON into array
     //we retrieve the id list 
     $idList = $_SESSION["idList"];
     echo ($idList);
       
    //we add the spot to the database
    $request = $db->prepare("INSERT INTO listitems (description, idList)
                             VALUES(:description, :idList)");
    
    //the parameters are bind to a specific variable name
    //$description = $input;
      
    $description = $_POST["description"];
    $request->bindParam(':description', $description);
    $request->bindParam(':idList', $idList);
    $request->execute();

    header("Location: home");
    exit(); 
  
?>

