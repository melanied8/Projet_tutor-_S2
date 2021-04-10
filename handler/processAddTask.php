<?php
    //https://grafikart.fr/forum/32789


    //To remove the notices
    error_reporting(E_ALL ^ E_NOTICE);

    if ($_SERVER['REQUEST_METHOD']==="POST")
    {
        if (isset($_POST['description']) )
        {  
                //on réccupère l'id qui correspond à la liste ouverte 
                $leNomDeLaList = "test";
                $sql = $db->prepare("SELECT idList FROM list WHERE name=? LIMIT 1");
                $sql->execute([$leNomDeLaList]);
                $result = $sql-> fetch();
                //echo $result[0];
                $idList =  $result[0];

    
                //on ajoute le nom de la liste à la base de donnée
                $request = $db->prepare("INSERT INTO listitems (description, deadline,  idList)
                    VALUES(:description, :deadline :idList)");
    
                    //the parameters are bind to a specific variable name
                    $description = $_POST['description'];
                    $date = $_POST['deadline'];
                    $request->bindParam(':description', $description);
                    $request->bindParam(':deadline', $date);
                    $request->bindParam(':idList', $idList);
                    $request->execute();

                    $_SESSION["msg_addList"] = "Nouvelle tache a été ajoutée avec succés";

                    header("Location: home");
                    exit();   
        }
    }
?>
