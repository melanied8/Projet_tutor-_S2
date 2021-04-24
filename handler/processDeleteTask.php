<?php
	require_once('../db_connect.php');

    $idItemJSON = file_get_contents('php://input');
    $id = json_decode($idItemJSON, TRUE); //convert JSON into array

    $id2 = $id["id"];
    // sql to delete a record
    $stmt =$db->prepare("DELETE FROM listitems WHERE idItem=$id2");
    $stmt-> execute();

    exit(); 

?>