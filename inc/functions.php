<?php

// Check if user is logged in, otherwise redirect
function ForceLogin() {
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php"); exit;
    }
}

// Deny access to logged in users
function ForceDashboard() {
	if(isset($_SESSION['user_id'])){
		// Get outta here
		header("Location: dashboard.php"); exit;
	}
}

?>