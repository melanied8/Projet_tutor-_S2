<?php

     //Initialise the session
	//require('../index.php');
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
	<script type="module" src="./js/index.js"></script>
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
            <?php
					$stmt =$db->prepare("SELECT id FROM users WHERE email= :email"); 
					$stmt-> execute(['email' => $_SESSION["email"]]);
					$usersId = $stmt-> fetchAll(PDO::FETCH_ASSOC);
					foreach($usersId as $row) {
						$ID = $row["id"];
						echo "id cua nguoi dung: " . $ID."<br/>";
					}

					$list =$db->prepare("SELECT name FROM list WHERE id= $ID"); 
					$list-> execute();
					$lesLists = $list-> fetchAll(PDO::FETCH_ASSOC);
					
					foreach($lesLists as $namelist) 
					{ ?>
                        <form method="POST">
						<a type="submit" href ="listDetails.php"><?php echo $namelist["name"]; ?></a>
                        </form>
					<?php }?>

				<li class="new-list"><button type="button"><img class="plus" src="./assets/plus.svg"></button>Nouvelle liste</li>
                <!--j'ajoute ca pour testé les codes PHP en attendent solution pour JS-->
                <li class="new-list"><img class="plus" src="./assets/plus.svg"><a href="Home2.php">Retour Home</a></li>
			</ul>
		
			<div class = "settings_and_deco">
				<img src="./assets/settings.svg">
				<a href="settings.html">Paramètres</a>
				<img src="./assets/logout.svg">
				<a href="login.html">Déconnexion</a>
			</div>
		</div>

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
</body>
</html>