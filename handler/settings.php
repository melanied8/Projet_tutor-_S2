<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
		<title>Settings</title>
		<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
  		/>
	</head>
	<body>
		<?php 
		if (!isset($_SESSION["email"])) {
				$_SESSION["msg_connection"] = "Veuillez vous connecter.";
				header("Location: login");
				exit(); 
		} 
		//we show the home page 
		else { ?>

		<div class="wrapper">
			<?php include('sidebar_menu.php') ?>

			<div class="desktop-grid">

				<div class = "rectangle_settings">
					<button type="button" class="menu-open-button"><img src="./assets/menu.svg"></button>
					<p>Paramètres</p>
				</div>


				<div class = "settings">

				<!-- Change your mail form -->
					<h2>Adresse e-mail</h2>
					<p>Adresse e-mail actuelle : <b><?php echo $_SESSION["email"] ?></b>  </p> 
					<form action="<?= route('/processSettingsChangeMail') ?>" method="POST">
						<label>Nouvelle adresse e-mail</label>
						<input class="box-model" type="email" name="email" placeholder="mail@provider.com">
						<label>Confirmer l'adresse e-mail</label>
						<input class="box-model" type="email" name="email_confirmation" placeholder="mail@provider.com">
						<button class="button box-model" type="submit">Modifier l'adresse e-mail</button>
						<?php 
						//Information on the current process
							if (!empty($_SESSION["msg_change_email"])) { 
								echo $_SESSION["msg_change_email"]; 
							} 
						?>
					</form>

					<!-- Change password form-->
					<h2 class = "settings-password">Mot de passe</h2>
					<form action="<?= route('/processSettingsChangePassword') ?>" method="POST">
						<label>Mot de passe actuel</label>
						<input class="box-model" type="password" name="current_password" placeholder="password">
						<label>Nouveau mot de passe</label>
						<input class="box-model" type="password" name="new_password" placeholder="password">
						<label>Confirmer le nouveau mot de passe</label>
						<input class="box-model" type="password" name="confirm_password" placeholder="password">
						<button class="button box-model" type="submit">Modifier le mot de passe</button>
						<?php 
							//Information on the current process
							if (!empty($_SESSION["msg_change_password"])) { 
								echo $_SESSION["msg_change_password"]; 
							} 
						?>
					</form>
				</div>
			</div>
		</div>
		<script type="module" src="./handler/dist/sidebarList.js"></script>
		<?php } ?>
	</body>
</html>



