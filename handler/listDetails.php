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
	<meta name="viewport" content="width=device-width, initial-scale=1.0"
  />
	<title>Details de la liste</title>
</head>

<body>	
	<div class="wrapper">

	<?php include('sidebar_menu.php') ?>

		<div class="listDetails-desktop-grid">
			<div class="list-details">
				<header class="header">
					<img class="menu" src="./assets/menu.svg" />
					<h2>Projet Tutoré</h2>
					<div class="delete-forever">
						<img src="./assets/delete-forever.svg">
						Supprimer la liste
					</div>
				</header>
				<ul class="task-list nav-list">
					<li class="item-size flex-item add-item">
							<button type="button" class="js-task-button"><img class="plus" src="./assets/plus.svg" /></button>
							<input class="js-task-input" type="text" name="" placeholder="Ajouter une tâche...">
					</li>
				</ul>
			</div>
		</div>

		<div class="edit">
			<div class="shadow"></div>
			<button class="close"><img src="./assets/close.svg" /></button>
			<form class="edit-form">
				<div class="form-item">
					<label class="title">Titre</label>
					<input class="edit-box style-box" type="text" name="title">
				</div>

				<div class="form-item">
					<label>Etapes</label>
					<ul class="nav-list">
						<li>
							<div class="edit-box style-box flex-item step">
								<div class="flex-item">
									<input class="radio radio-size" type="radio" name="radio">
									<label>Aller sur github.com</label>
								</div>
								<img class="remove" src="./assets/remove.svg">
							</div>
						</li>
						<li class="edit-box style-box new-step">
							<input type="text" name="new-step" placeholder="Nouvelle etape">
							<img src="./assets/plus.svg">
						</li>
					</ul>
				</div>

			
			
				<div class="form-item">
					<label>Echéance</label>
					<input class="dead-line style-box edit-box" type="date" name="date">
				</div>

				<div class="form-item">
					<label class="notes">Note</label>
					<textarea class="textarea" name="notes" placeholder="Quelques details à propos de cette tache..."></textarea>
				</div>
				<div class="edit-button">
					<button class="pink" type="submit">Enregistrer</button>
					<button class="grey cancel-button" type="#">Annuler</button>
				</div>
			</form>
		</div>
	</div>

<script type="module" src="./handler/dist/index.js"></script>
<script type="module" src="./handler/dist/app.js"></script>
</body>
</html>

