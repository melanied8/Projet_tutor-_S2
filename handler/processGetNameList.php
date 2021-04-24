  
<?php
$_SESSION["nameList"]=NULL;
//Delete notices
error_reporting(E_ALL ^ E_NOTICE);

    $listId = $_GET['id'];
    //Get the name of the list
            $request = $db->prepare("SELECT name FROM list WHERE idList = :idList"); 
			$request->execute(['idList'=> $listId ]);
			$nameOfTheList = $request-> fetch(PDO::FETCH_ASSOC);

            if($nameOfTheList!=NULL)
            {
                $_SESSION["nameList"]=$nameOfTheList['name'];
            }
            else
            {
                $_SESSION["nameList"]="Erreur dans la récupération de la liste";
            }
            
?>