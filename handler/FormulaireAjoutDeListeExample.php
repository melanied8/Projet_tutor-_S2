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
	<form action="<?= route('/processAddList') ?>" method="POST" class="login">
		<label>Nom de la liste</label> 
		<input class="box-model" type="text" name="listName" placeholder="la liste">
		<button class="button box-model pink" type="submit">ajouter</button>
	</form>
    <?php if (!empty($_SESSION["msg_addList"]))
            { 
             echo $_SESSION["msg_addList"]; 
            } 
        ?>

	</div>
</body>
</html>
