<?php

    $idListDelete = $_SESSION["idList"];

    // sql to delete a record
    $stmt =$db->prepare("DELETE FROM list WHERE idList= :idList");
    $stmt->execute( [ ':idList' => $idListDelete,]);
    $stmt-> execute();

    //Delete the tasks assigned to the list
    $request =$db->prepare("DELETE FROM listitems WHERE idList= :idList");
    $request->execute( [ ':idList' => $idListDelete,]);
    $request-> execute();

    header("Location: home");
    exit(); 

?>

