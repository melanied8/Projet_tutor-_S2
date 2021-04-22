<!-- FOR THE HOME PAGE -->
<?php

//Delete notices
error_reporting(E_ALL ^ E_NOTICE);

    $listId = $_GET['id'];
		
            //we select all of their tasks
			$task = $db->prepare("SELECT description FROM listitems WHERE idList = :idList"); 
			$task->execute(['idList'=> $listId ]);
			$lesTask  = $task-> fetchAll(PDO::FETCH_ASSOC);
			foreach($lesTask as $row1) 
			{
				?>
                <li class="nav-box flex-item item-size space-between">
                    <div class="flex-item">
                    <input class="radio-size radio" type="radio" name="" id="radio">   
                    <?php	echo $row1['description'] . " "; ?> 
                    </div>
                    <a href=""><img class="delete" src="./assets/delete.svg"></a>
                </li> 
			    <?php
			}
		
    
?>
