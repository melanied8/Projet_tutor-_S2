<?php
	//we retrieve the id of the user
	$stmt =$db->prepare("SELECT id FROM users WHERE email= :email"); 
	$stmt-> execute(['email' => $_SESSION["email"]]);
	$usersId = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    if ($usersId > 0) {
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
		?>
        <li><a href ="listDetails"></li>
        <?php 
        $lien = route('/listDetails');
        ?>
        <div class = "display_list">
       <?php echo "<a href =$lien?id=" . $row["idList"] . ">" . $row["name"]."</a>";  
        ?>
        </div>
        <?php
    }
	}
	else{
    echo "0 results";
	}
?>

