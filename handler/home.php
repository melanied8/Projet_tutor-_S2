<?php

     //Initialise the session
	require('../index.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
		<title>Accueil</title>
		<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	  	/>
	</head>
	<body>

		<div class="wrapper">

			<div class="sidebar">
			<img src="./assets/home.svg"> <?php echo $_SESSION["email"] ?> 
			<div class = "lists_and_line">
			<h1>Mes listes</h1>
			<svg class="line" width="176" height="1" viewBox="0 0 176 1" fill="none" xmlns="http://www.w3.org/2000/svg">
				<line x1="4.37114e-08" y1="0.5" x2="176" y2="0.500015" stroke="#ADADAD"/>
				</svg>
			</div>
		
			<ul class="nav-list">
				<li class="nav-list-item">To do today<div class="increment-box">2</div></li>
				<li class="nav-list-item">Stage<div></div></li>
				<li class="new-list"><img class="plus" src="./assets/plus.svg">Nouvelle liste</li>
			</ul>
			
			<div class = "settings_and_deco">
			<img src="./assets/settings.svg">
			<a href="settings.php">Paramètres</a> <!-- je sais pas pk qd je met le router ça m'envoie sur un .html -->
			<img src="./assets/logout.svg">
			<a href="<?= route('/logout') ?>">Déconnexion</a>
			</div>
			</div>


			<div class = desktop-grid>
				<div class = "rectangle_settings">

					<img src="./assets/menu.svg">
					<p>Prochaines tâches</p>
					</div>
			<ul>
				<li></li>
			</ul>
			</div>

	    </div>




	</body>
</html>