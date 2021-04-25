<?php
	//we retrieve the id of the user
	$stmt =$db->prepare("SELECT id FROM users WHERE email= :email"); 
	$stmt-> execute(['email' => $_SESSION["email"]]);
	$usersId = $stmt-> fetchAll(PDO::FETCH_ASSOC);
	if ($usersId > 0)
	{
		foreach($usersId as $row) 
	    	{
			$IDuser = $row["id"];
		}

		//We retrieve every list name and list id of that user
		$list =$db->prepare("SELECT name, idList FROM list WHERE id= $IDuser"); 
		$list-> execute();
		$lesLists = $list-> fetchAll(PDO::FETCH_ASSOC);
		foreach($lesLists as $row) 
		{ 
			//count the tasks for each list
			$task = $db->prepare("SELECT count(idItem) AS nbTasks FROM listItems WHERE
            idList= :idList");
            $task->execute(['idList' => $row["idList"]]);
            $tasks = $task->fetchAll(PDO::FETCH_ASSOC);

			?>
			<div class = "display_list">
           <li <?php echo "id=". $row["name"] ?> class="nav-list-item">
                <a <?php echo "href=" . route('/listDetails'). "?id=" . $row['idList'] ?>><?= $row["name"] ?></a>
			
				<?php if(intval($tasks[0]["nbTasks"]) !== 0)
				{ ?>
					 <div class="increment-box"><p><?php echo $tasks[0]["nbTasks"] ?></p></div> 
		        <?php 
				}
				 ?> 
			</div>
		
            </li>
			
			<?php
	   	}
	}
		else {
	   	echo "0 results";
		}
?>
