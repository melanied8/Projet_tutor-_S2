<!-- FOR THE HOME PAGE -->
<?php

    $listId = $_GET['id'];
		
            //we select all of their tasks
			$task = $db->prepare("SELECT itemName, iditem FROM listitems WHERE idList = :idList"); 
			$task->execute(['idList'=> $listId ]);
			$lesTask  = $task-> fetchAll(PDO::FETCH_ASSOC);
			foreach($lesTask as $row1) 
			{
				?>
                <li class="nav-box flex-item item-size space-between">
                    <div class="flex-item">
                    <input class="radio-size radio" type="checkbox" name="" id="radio">   
                    <?php	echo $row1['itemName'] . " ";
                            echo $row1['iditem'] . " "; ?> 
                    </div>
                    <a href=""><img class="delete" src="./assets/delete.svg"></a>
                </li> 
			    <?php
			}
		
    
?>
