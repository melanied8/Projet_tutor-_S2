<!-- MODIFICATION -->
<?php
    //get the name of the task from addTask asynchronous js function 
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE); //convert JSON into array
    
    //var_dump($input);
    
    //we retrieve the id list 
    $idList = $_GET['id'];            
    //we add the spot to the database
    $request = $db->prepare("INSERT INTO listitems (description, deadline, idList)
                             VALUES(:description, :deadline, :idList)");
    
    //the parameters are bind to a specific variable name
    $description = $input;
    $date = "12/04/2021";
    $request->bindParam(':description', $description);
    $request->bindParam(':deadline', $date);
    $request->bindParam(':idList', $idList);
    $request->execute();

    header("Location: listDetails");
    exit(); 
  
?>
