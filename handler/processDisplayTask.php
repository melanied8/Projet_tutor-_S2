<!-- FOR THE HOME PAGE -->
<?php
    
    //we select the id of the current user
    $stmt =$db->prepare("SELECT id FROM users WHERE email= :email"); 
    $stmt-> execute(['email' => $_SESSION["email"]]);
    $usersId = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    if ($usersId > 0) {
    foreach($usersId as $row) 
    {
        $IDuser = $row["id"];
        
    }
    //we select all of their lists 
    $stmt = $db->prepare("SELECT idList FROM list WHERE  id = :id");
        $stmt->execute( ['id'=> $IDuser]);
        $listId  = $stmt-> fetchAll(PDO::FETCH_ASSOC);
		foreach($listId as $row) 
		{
            //we select all of their tasks
			$task = $db->prepare("SELECT itemName, status, iditem FROM listitems WHERE idList = :idList"); 
			$task->execute(['idList'=> $row['idList'] ]);
			$lesTask  = $task-> fetchAll(PDO::FETCH_ASSOC);
			foreach($lesTask as $row1) 
			{
                $class="class=\"task nav-box flex-item item-size space-between\"";
                if($row1['status'])
                    $class = "class=\"task nav-box flex-item item-size space-between done\"";
                ?>
                <li <?= "id=" . $row1['iditem'] . " " . $class?> >
                    <div class="flex-item">
                    <input class="radio radio-size" type="checkbox" name="" id="radio" <?php if($row1['status']) { echo "checked"; } ?> >   
                    <?php   echo htmlspecialchars($row1['itemName'])?> 
                    </div>
                    <button class="delete-task"><img class="delete" src="./assets/delete.svg"></button>
                </li> 
			    <?php
			}
		}
    }
    else{
        echo "0 results";
    }
?>

