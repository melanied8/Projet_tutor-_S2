<?php
    $_SESSION = array();
    
    // Destroy the session
    session_destroy();  
    header('Location: login');
    exit();
 
?>
