<?php
	//Initialise the session
	session_start();
	require_once('./db_connect.php');

	$requestURI = $_SERVER['REQUEST_URI'];

	//The configuration is loaded from its file.
	$config = require('config.php');

	//The route array contains the correspondence.URI => handler.
	$route = require('routes.php');
	
	if (substr($requestURI, 0, strlen($config['uri_prefix'])) == $config['uri_prefix']) {
	$requestURI = substr($requestURI, strlen($config['uri_prefix']));
	}
	

	function route($route) {
		global $config;
		return $config['uri_prefix'].$route;
	}
	
	$handler = $route[$requestURI];
	
	// Si la variable n'a pas de valeur, c'est que l'URI demandée n'est pas dans le
	// tableau, donc n'est pas gérée. 404.
	if (!isset($handler)) {
		http_response_code(404);
		echo '404';
		exit;
	}
	
	// On inclu le fichier correspondant.
	include("handler/$handler.php"); 
	
	?>

