<div class="sidebar">
	<div class="close-button-and-home">
	<button class="menu-close-button"></button>
	<img src="./assets/home.svg">
	<b><?php echo $_SESSION["email"] ?></b> 
	</div>

	<div class = "lists_and_line">
	<h1>Mes listes</h1>
	<svg class="line" width="176" height="1" viewBox="0 0 176 1" fill="none" xmlns="http://www.w3.org/2000/svg">
		<line x1="4.37114e-08" y1="0.5" x2="176" y2="0.500015" stroke="#ADADAD"/>
		</svg>
	</div>
	
	<ul>
	<!-- Affichage des listes -->	   
		<?php include("processDisplayList.php") ?>

		<form action="<?= route('/processAddList') ?>" method="POST">	
		<div class="new-list"><li><img src="./assets/plus.svg">Nouvelle liste</li></div>
		<div id="write-new-list">
		<input class="box-model" type="text" name="listName" placeholder="Nom de la liste">
		<button class="button box-model" type="submit">Valider la liste</button>
		</div>
	</ul>
	</form>
	
	<div class = "settings_and_deco">
	<img src="./assets/settings.svg">
	<label> <a href="<?= route('/settings') ?>">Paramètres</a></label>
	<img src="./assets/logout.svg">
	<label><a href="<?= route('/logout') ?>">Déconnexion</a></label>
	</div>
</div>
<script type="module" src="./handler/dist/index.js"></script>
