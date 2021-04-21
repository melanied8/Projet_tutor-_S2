<?php

    $idListDelete = $_SESSION["idList"];

    // sql to delete a record
    $stmt =$db->prepare("DELETE FROM list WHERE idList= :idList");
    $stmt->execute( [ ':idList' => $idListDelete,]);
    $stmt-> execute();

    header("Location: home");
    exit(); 

?>

