<?php

//Initialise the session
require('../index.php');
//To remove the notices
error_reporting(E_ALL ^ E_NOTICE);
//To update the error indications
$_SESSION["msg"]="";
$document= file_get_contents('login.html');
echo $document;
if (!empty($_SESSION["msg_login"])) {
        	echo ($_SESSION["msg_login"]); 
}

?>