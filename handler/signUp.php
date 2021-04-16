<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"
  	/>
	<title>Inscription</title>
</head>
<body>
	<?php
		//we test if a session is open 
		//if yes, we redirect to the home page
		if (isset($_SESSION["email"])) {
			$_SESSION["msg_connection"] = "Veuillez vous connectez.";
			header("Location: home");
			exit(); 
		} 
		//else we show the signUp page 
		else { ?>
	<div class="signup-wrapper">
	<form action="<?= route('/processSignUp') ?>" method="POST" class="signup">
		<label>Adresse e-mail</label> 
		<input class="box-model" type="email" name="email" placeholder="mail@provider.com">
		<label>Mot de passe</label>
		<input class="box-model" type="password" name="password" placeholder="password">
		<label>Répéter le mot de passe</label>
		<input class="box-model" type="password" name="confirm_password" placeholder="password">
		<button class="button box-model pink" type="submit">Inscription</button>
		<?php
			//Information on the current process
			if (!empty($_SESSION["msg_register"])) 
			{
				echo ($_SESSION["msg_register"]); 
			}
		?>
	</form>
	</div>
	<?php } ?>
</body>
</html>
