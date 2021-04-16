<!DOCTYPE html>
<html>
	<head>
		<title>Réinitialisation du mot de passe</title>
		<head>
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	</head>
	<body>
	<?php
		//we test if a session is open 
		//if not we redirect to the login page
		if (!isset($_SESSION["email"])) {
			$_SESSION["msg_connection"] = "Veuillez vous connecter.";
			header("Location: login");
			exit(); 
		} 
		//we show the forgottenPassword page 
		else { ?>
		<div class="fp-wrapper">
			<form class="fp" action="<?= route('/processUpdatePassword') ?>" method="POST" class="login">
				<label class="label">Nouveau mot de passe</label> 
				<input class="box-model" type="password" name="new_password" placeholder="mail@provider.com">
				<label class="label">Confirmer le nouveau mot de passe</label> 
				<input class="box-model" type="password" name="confirm_password" placeholder="mail@provider.com">
				<button class="pink button box-model" type="submit">Envoyer</button>
				<?php
				//Information on the current process
				if (!empty($_SESSION["msg_new_password"])) 
						{
							echo ($_SESSION["msg_new_password"]); 
						}
				?>
			</form>
			</div>
	<?php } ?>
	</body>
</html>


