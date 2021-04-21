<!-- FOR THE HOME PAGE -->
<?php

if ($_SERVER['REQUEST_METHOD']==="POST")
	{
        if (isset($_POST['$itemName']))
		{

            // sql to delete a record
            $stmt =$db->prepare("DELETE FROM listitems WHERE idItem= :idItem");
            $stmt->execute( [ ':idItem' => $_POST["$idItem"]]);
            $stmt-> execute();

            header("Location: home");
            exit(); 
        }


?>
