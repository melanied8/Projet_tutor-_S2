<?php
	$stmt =$db->prepare("SELECT id FROM users WHERE email= :email"); 
	$stmt-> execute(['email' => $_SESSION["email"]]);
	$usersId = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    if ($usersId > 0) {
	foreach($usersId as $row) 
    {
		$IDuser = $row["id"];
		//echo "id of the user: " . $ID."<br/>";
	}

	$list =$db->prepare("SELECT name, idList FROM list WHERE id= $IDuser"); 
	$list-> execute();
	$lesLists = $list-> fetchAll(PDO::FETCH_ASSOC);
	foreach($lesLists as $row) 
	{ 
        $idlist = $row['idList']
        ?>
        <ul>
		<li><a href ="listDetails">
        <?php 
        echo $row["name"]." "; 
        echo $row['idList'];
        ?></a> 
        <a href="<?= route('/processDeleteList') ?>"><img src="./assets/delete.svg"> </a></li>
		</ul>
        <?php 
    }
}
else{
    echo "0 results";
}
?>