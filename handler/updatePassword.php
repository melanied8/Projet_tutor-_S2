<?php
	//Initialise the session
	//require('../index.php');
	//To remove the notices
	error_reporting(E_ALL ^ E_NOTICE);
	//To update the error indications
	$_SESSION["msg"]="";
?>

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
		<form action="<?= route('/processUpdatePassword') ?>" method="POST" class="login">
			<label class="label">Nouveau mot de passe</label> 
			<input class="box-model" type="password" name="new_password" placeholder="mail@provider.com">
			<label class="label">Confirmer le nouveau mot de passe</label> 
			<input class="box-model" type="password" name="confirm_password" placeholder="mail@provider.com">
			<button class="button box-model" type="submit">Envoyer</button>
		</form>
	</body>
</html>
<?php
if (!empty($_SESSION["msg_reset"])) 
		{
        	echo ($_SESSION["msg_reset"]); 
    	}
?>