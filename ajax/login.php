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
		$password = $_POST['password'];

		// Make sure user does not already exist (email must be unique)

		$findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
		$findUser->bindParam(':email', $email, PDO::PARAM_STR);
		$findUser->execute();
		
		// Make sure user can be added and is added
		
		if ($findUser->rowCount() == 1){
			// User exists, try and sign them in
			$User = $findUser->fetch(PDO::FETCH_ASSOC);

			$user_id = (int) $USER['user_id'];
			$hash = $User['password'];

			if(password_verify($password, $hash)){
				// User is signed in
				$return['redirect'] = 'dashboard.php';
				$return['is_logged_in'] = true;

				$_SESSION['user_id'] = $user_id;
			} else {
				// Invalid email-password combo
				$return['error'] = "Invalid user email or password.";
			}
			
		} else {
			// User does not exist, should register
			$return['error'] = "You do not have an account. <a href='register.php'>Register here.</a>";

		}

		echo json_encode($return, JSON_PRETTY_PRINT); exit;
	} else {
		// Die. Kill the script, redirect, etc.
		exit('Invalid URL');
	}
?>