<?php 
	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "../inc/config.php"; 

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		// Always return JSON format
		header('Content-Type: application/json');

		$return = [];

		$email = Filter::String( $_POST['email'] );

		$userFound = User::Find($email,true);
		
		// Make sure user can be added and is added
		
		if ($userFound){
			// User exists
			// We can also attempt to log them in
			$return['error'] = "You already have an account. <a href='login.php'>Login here.</a>";
			$return['is_logged_in'] = false;
		} else {
			// User does not exist, add them now

			// Hash the password
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$addUser = $con->prepare("INSERT INTO users(email, password) VALUES(LOWER(:email), :password)");
			$addUser->BindParam(':email', $email, PDO::PARAM_STR);
			$addUser->BindParam(':password', $password, PDO::PARAM_STR);
			$addUser->execute();

			$user_id = $con->lastInsertId();

			$_SESSION['user_id'] = (int) $user_id;

			// Return the proper information back to JS to redirect user
			$return['redirect'] = '/PHP-Login-System/dashboard.php?message=welcome';
			$return['is_logged_in'] = true;
		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script, redirect, etc.
		exit('Invalid URL');
	}
?>