<?php
    $nameList = $_GET['id'];  
    // sql to delete a record
    $stmt =$db->prepare("DELETE FROM list WHERE name= :name");
    $stmt->execute( [ ':name' => $nameList,]);
    $stmt-> execute();

    
?>
