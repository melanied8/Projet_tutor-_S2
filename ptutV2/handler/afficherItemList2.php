<p class="new-list"><img class="plus" src="./assets/plus.svg"><a href="home">RetourHome</a></p>
<H1>Afficher les items de List7.1 qui a idList =  $IdList</h1>
<ul class="nav-list">
            <?php
                    $IdList = 1;
                    
					$stmt =$db->prepare("SELECT description, deadline FROM listitems WHERE idList = $IdList"); 
					$stmt-> execute();
					$lesItems = $stmt-> fetchAll(PDO::FETCH_ASSOC);
					foreach($lesItems as $descripItem) { ?>
                            
                            <a href ="listDetails"><?php echo $descripItem ["description"]."=>>"."deadline".":".$descripItem ["deadline"]."</br>"?></a>
                            
                    <?php }?>


</ul>
<p> <img class="plus" src="./assets/plus.svg"><a href="deleteitemList">deleteItemList</a></p>