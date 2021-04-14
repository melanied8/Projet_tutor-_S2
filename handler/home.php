
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

			
			<?php include('sidebar_menu.php') ?>


			<!---
			<div class = desktop-grid>
				<div class = "rectangle_settings">

					<img src="./assets/menu.svg">
					<p>Prochaines tâches</p>
					</div>
			<ul>
				<li></li>
			</ul>
			</div>
			-->
	   
		

		<div class="desktop-grid">
				
			<div class = "rectangle_settings">
			<button type="button" class="menu-open-button"></button>
			<p>Prochaines tâches</p>
		</div>

		</div>

	</div>



	<script type="module" src="./handler/dist/app.js"></script>
	</body>
</html>
