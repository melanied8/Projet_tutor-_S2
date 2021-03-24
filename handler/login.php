<?php
    //Initialise the session
    require('../index.php');
    //To remove the notices
    error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html>
<head> 
    <h1>JDR</h1> 
</head>
<body>
    <h1>Formulaire de connexion</h1>

        <form  action="<?= route('/process_login') ?>" method="POST">
            <input type="text"  name="login" placeholder="Nom d'utilisateur" required/>
            <input type="password" name="psswrd" placeholder="Mot de passe" required/>
            <input type="submit" value="Connexion " name="submit"/>
        </form>
        <?php if (!empty($_SESSION["msg"]))
            { 
             echo $_SESSION["msg"]; 
            } 
        ?>
       
        <p>Vous êtes nouveau ici? <a href="<?= route('/register') ?>">S'inscrire</a></p>
        <p >Vous oubliez mot de passe? <a href="<?= route('/forgot_username') ?>">Réinitialiser le mot de passe</a></p>
</body>
</html>
