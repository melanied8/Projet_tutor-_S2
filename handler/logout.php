<?php

     //Initialise the session
	require('../index.php');

    $_SESSION = array();
    
    // Destroy the session
    session_destroy();  
    header('Location: login.php');
    exit();
 
?>