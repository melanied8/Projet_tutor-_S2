
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
		//echo "id of the user: " . $ID."<br/>";
	}

	$list =$db->prepare("SELECT name, idList FROM list WHERE id= $IDuser"); 
	$list-> execute();
	$lesLists = $list-> fetchAll(PDO::FETCH_ASSOC);
	foreach($lesLists as $row) 
	{ 
        ?>
		<li><a href ="listDetails">
        <?php 
        echo $row["name"]." "; 
        ?></a> 
        <?php 
    }
}
else{
    echo "0 results";
}
?>