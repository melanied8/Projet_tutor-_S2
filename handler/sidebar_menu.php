<div class="sidebar">
	
	<button class="menu-close-button"><img src="./assets/close.svg"></button>
	<div class="button-home">

	
	<a href="<?= route('/home') ?>">
	<img src="./assets/home.svg"> </a>					
	<b><?php echo $_SESSION["email"] ?></b> 
	</div>

	<div class = "lists_and_line">
	<h1>Mes listes</h1>
	<svg class="line" width="176" height="1" viewBox="0 0 176 1" fill="none">
		<line x1="4.37114e-08" y1="0.5" x2="176" y2="0.500015" stroke="#ADADAD"/>
		</svg>
	</div>
	
	<ul>
	<!-- Lists view -->	   
		<?php include("processDisplayList.php") ?>

		<form action="<?= route('/processAddList') ?>" method="POST">	

	    <button class="button_plus" type="submit"><img src="./assets/plus.svg"></button>
		<input type="text" class="new_list" name="listName" placeholder="Nouvelle liste">

		<?php
			//Information on the current process
			if (!empty($_SESSION["msg_addList"])) 
				{
					echo("<br/>");
					echo ($_SESSION["msg_addList"]); 
				}
		?>
		
	</ul>
	</form>
	
	<div class = "settings_and_deco">
	<img src="./assets/settings.svg">
	<label> <a href="<?= route('/settings') ?>">Paramètres</a></label>
	<img src="./assets/logout.svg">
	<label><a href="<?= route('/logout') ?>">Déconnexion</a></label>
	</div>
</div>

