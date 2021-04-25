<!-- FOR THE HOME PAGE -->
<?php

    $listId = $_GET['id'];
		
            //we select all of their tasks
			$task = $db->prepare("SELECT itemName, iditem, status FROM listitems WHERE idList = :idList"); 
			$task->execute(['idList'=> $listId ]);
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
                    <?php	echo $row1['itemName']?> 
                    </div>
                    <button class="delete-task"><img class="delete" src="./assets/delete.svg"></button>
                </li> 
			    <?php
			}
		 
    
?>
