<?php
	//Initialise the session
	require('../index.php');
	//To remove the notices
	error_reporting(E_ALL ^ E_NOTICE);
	//To update the error indications
	$_SESSION["msg"]="";
	$document= file_get_contents('signUp.html');
	echo $document;

	for ( $int =0; $int <1 ; $int++)
	{
		if (!empty($_SESSION["msg_register"])) 
				{
					echo ($_SESSION["msg_register"]); 
				}
	}
?>