<?php
	//Initialise the session
	session_start();
	require_once('../db_connect.php');

	$requestURI = $_SERVER['REQUEST_URI'];

	//The configuration is loaded from its file.
	$config = require('config.php');

	//The route array contains the correspondence.URI => handler.
	$routes = require('routes.php');

	function route($route) {
		global $config;
		return $config['uri_prefix'].$route;
	}
?>
