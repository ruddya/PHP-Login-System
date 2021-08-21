<?php 
	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "../inc/config.php"; 

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Always return JSON format
		header('Content-Type: application/json');

		$return = [];

		// Make sure user does not already exist
		

		// Make sure user can be added and is added

		// Return the proper information back to JS to redirect user

		$return['redirect'] = 'dashboard.php?welcome';

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script, redirect, etc.
		exit;
	}
?>