<?php 
	//if there is no constant defined named __CONFIG__ do not load this file
	if(!defined('__CONFIG__')){
		exit('You do not have a config file');
		//ideally, redirect or 404 error
	}



	// Following code only runs if __CONFIG__ is defined ie. from an intended page like index.php
	
	// Sessions on
	if(!isset($_SESSION)) {
		session_start();
	}

	// Allow error reporting
	/*
	error_reporting(-1);
	ini_set('display_errors', 'On');
	*/

	// Include important classes
	include_once "classes/DB.php";
	include_once "classes/Filter.php";
	include_once "functions.php";

	$con = DB::getConnection();

?>