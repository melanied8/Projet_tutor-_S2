<?php 
	$listname = $_GET['id'];
	$request = $db->prepare("SELECT name FROM list WHERE idList= $listname");
	$request->execute();
	$requestResult = $request->fetchAll(PDO::FETCH_ASSOC);
	foreach($requestResult as $row) {
		$name = $row['name'];
	}
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
	<?php
		//we test if a session is open 
		//if not we redirect to the login page
		if (!isset($_SESSION["email"])) {
			echo($_SESSION["msg_connection"] = "Veuillez vous connecter.");
			header("Location: login");
			exit(); 
		} 
		//we show the listDetails page 
		else { 
			$_SESSION["idList"] = $_GET['id']; 
			include('processGetNameList.php');
			?>
	<div class="wrapper">

	<?php include('sidebar_menu.php') ?>

		<div class="listDetails-desktop-grid">
			<div class="list-details">
				
				<header class="header">
				<button type="button" class="menu-open-button"><img src="./assets/menu.svg"></button>
					<h2 <?= "id=" . $_GET['id'] ?> class="title-list"><?php echo($_SESSION["nameList"]);?></h2>
					
					<a href="<?= route('/processDeleteList') ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette liste?'));"> 
					<div class="delete-forever">
					 <img src="./assets/delete-forever.svg"> 
						Supprimer la liste
					</div></a>
				</header>

			
				<ul class="task-list nav-list">
				<?php include('processDisplayTaskListDetails.php') ?>
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

	<script type="module" src="./handler/dist/app.js"></script>
	<script type="module" src="./handler/dist/index.js"></script>
	<script type="module" src="./handler/dist/form.js"></script> 
	<script type="module" src="./handler/dist/sidebarList.js"></script>
	<script type="module" src="./handler/dist/task.js"></script>
	<?php } ?>
	
</body>
</html>




