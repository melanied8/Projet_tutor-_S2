<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"
  	/>
	<title>Connexion</title>
</head>
<body>
<?php echo $_SESSION["email"] ?> 
	<div class="login-wrapper">
	<form action="<?= route('/processAddTask') ?>" method="POST" class="login">
		<label>Nom de la liste</label> 
		<input class="box-model" type="text" name="description" placeholder="la tache">
        <input class="box-model" type="date" name="deadline" placeholder="la date">
		<button class="button box-model pink" type="submit">ajouter</button>
	</form>

    <?php if (!empty($_SESSION["msg_addTask"]))
            { 
             echo $_SESSION["msg_addTask"];  
            } 
        ?>
	</div>

</body>
</html>
