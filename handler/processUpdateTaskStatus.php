<?php
        
    require_once('../db_connect.php');

    $taskStatusJSON = file_get_contents('php://input');
    $taskStatus = json_decode($taskStatusJSON, TRUE); //convert JSON into array

    $status = $taskStatus['status'];
    $idItem = $taskStatus['id'];
    $stmt =$db->prepare("UPDATE listitems set status =$status  WHERE idItem=$idItem");
    $stmt-> execute();
    exit();