<?php
	//Initialise the session
	require('../index.php');
	//To remove the notices
	error_reporting(E_ALL ^ E_NOTICE);
	//To update the error indications
    //$_SESSION["msg_change_email"]="";
?>
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
	<div class="wrapper">

	<div class="sidebar">
	<p><img src="./assets/home.svg"><?php echo $_SESSION["email"] ?> 
	<div class = "lists_and_line">
	<h1>Mes listes</h1>
	<div class="settings-line"></div>
	</div>

	<ul>
		<li class="nav-list-item">To do today<div class="increment-box">2</div></li>
		<li class="nav-list-item">Stage<div></div></li>
		<li><img src="./assets/plus.svg"><div class="new-list"><!--<a href="process_addList.php">-->Nouvelle liste</div></li>
		<div id="write-new-list">
		<input class="box-model" type="text" name="new_list" placeholder="Nom de la liste">
		<button class="button box-model" type="submit">Valider la liste</button>
		</div>
	</ul>
	
	<div class = "settings_and_deco">
	<img src="./assets/settings.svg">
	<label> <a href="settings.php">Paramètres</a></label>
	<img src="./assets/logout.svg">
	<label><a href="logout.php">Déconnexion</a></label>
	</div>
	</div>

<div class="desktop-grid">

	<div class = "rectangle_settings">
	<button type="button" class="menu-open-button"></button>
	<p>Paramètres</p>
	</div>


<div class = "settings">

<h2>Adresse e-mail</h2>
<p>Adresse e-mail actuelle : </p>
<!-- Mettre le $_SESSION['login'] -->
<form action="<?= route('/processSettingsChangeMail') ?>" method="POST">
<label>Nouvelle adresse e-mail</label>
<input class="box-model" type="email" name="email" placeholder="mail@provider.com">
<label>Confirmer l'adresse e-mail</label>
<input class="box-model" type="email" name="email_confirmation" placeholder="mail@provider.com">
<button class="button box-model" type="submit">Modifier l'adresse e-mail</button>
</form>
<?php if (!empty($_SESSION["msg_change_email"]))
            { 
             echo $_SESSION["msg_change_email"]; 
            } 
        ?>

<h2 class = "settings-password">Mot de passe</h2>
<form action="<?= route('/processSettingsChangePassword') ?>" method="POST">
<label>Mot de passe actuel</label>
<input class="box-model" type="password" name="current_password" placeholder="password">
<label>Nouveau mot de passe</label>
<input class="box-model" type="password" name="new_password" placeholder="password">
<label>Confirmer le nouveau mot de passe</label>
<input class="box-model" type="password" name="confirm_password" placeholder="password">
<button class="button box-model" type="submit">Modifier le mot de passe</button>
</form>
<?php if (!empty($_SESSION["msg_change_password"]))
            { 
             echo $_SESSION["msg_change_password"]; 
            } 
        ?>
</div>

</div>

</div>


</body>
</html>
