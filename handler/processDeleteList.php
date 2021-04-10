<?php

    //*!!!* En php j'ai pa trouver pour recupper le text-content de la variable dans le foreach 
    // du scrip processDisplayList.php
    //pour l'intant je met "test3" une liste que j'ai créee dans ma base
    $nameList = "test3";


    // sql to delete a record
    $stmt =$db->prepare("DELETE FROM list WHERE name= :name");
    $stmt->execute( [ ':name' => $nameList,]);
    $stmt-> execute();

    
?>
