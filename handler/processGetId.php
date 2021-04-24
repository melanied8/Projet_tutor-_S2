<?php
    require_once('../db_connect.php');

    $request2 = $db->prepare("SELECT MAX(idItem) AS dernierItem FROM listitems");
    $request2->execute();

    $result = $request2->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);

    exit();

?>