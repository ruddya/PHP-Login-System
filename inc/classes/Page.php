<?php
// If there is no constant defined named __CONFIG__ do not load this file
if(!defined('__CONFIG__')){
	exit('You do not have a config file');
	// Ideally, redirect or 404 error
}

class Page {

	// Check if user is logged in, otherwise redirect
	static function ForceLogin() {
	    if(!isset($_SESSION['user_id'])){
	        header("Location: /PHP-Login-System/login.php"); exit;
	    }
	}

	// Deny access to logged in users
	static function ForceDashboard() {
		if(isset($_SESSION['user_id'])){
			// Get outta here
			header("Location: /PHP-Login-System/dashboard.php"); exit;
		}
	}
}



?>