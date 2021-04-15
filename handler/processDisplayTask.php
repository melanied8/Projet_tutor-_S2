<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./handler/css/style.css" />
    </head>
</html>

<?php
    $stmt =$db->prepare("SELECT id FROM users WHERE email= :email"); 
    $stmt-> execute(['email' => $_SESSION["email"]]);
    $usersId = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    if ($usersId > 0) {
    foreach($usersId as $row) 
    {
        $IDuser = $row["id"];
        
    }

    $stmt = $db->prepare("SELECT idList FROM list WHERE  id = :id");
            $stmt->execute( ['id'=> $IDuser]);
            $listId  = $stmt-> fetchAll(PDO::FETCH_ASSOC);
			foreach($listId as $row) 
			{
				//echo $row['idList'];

				$task = $db->prepare("SELECT description FROM listitems WHERE idList = :idList"); 
				$task->execute(['idList'=> $row['idList'] ]);
				$lesTask  = $task-> fetchAll(PDO::FETCH_ASSOC);
				foreach($lesTask as $row1) 
				{
					echo $row1['description'] . " ";
				}
			}
    
   
}
else{
    echo "0 results";
}
?>
