<?php

// If there is no constant defined named __CONFIG__ do not load this file
if(!defined('__CONFIG__')){
	exit('You do not have a config file');
	// Ideally, redirect or 404 error
}

class User {

	private $con;

	public $user_id;
	public $email;
	public $reg_time;

	public function __construct(int $user_id){
		$this->$con = DB::getConnection();

		$user_id = Filter::Int( $user_id );

		$user = $this->$con->prepare("SELECT user_id, email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
		$user->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$user->execute();

		if($user->rowCount() == 1){
			// User found, set relevant values
			$user = $user->fetch(PDO::FETCH_OBJ);

			$this->email 		= (string) $user->email;
			$this->user_id 		= (int) $user->user_id;
			$this->reg_time 	= (string) $user->reg_time;
		} else {
			// User not found, let's clear the session and reset.
			header("Location: /PHP-Login-System/logout.php"); exit;
		}
	}

	public static function Find($email, $return_assoc = false){
		$con = DB::getConnection();
		$email = (string) Filter::String( $email );

		$findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
		$findUser->bindParam(':email', $email, PDO::PARAM_STR);
		$findUser->execute();

		if($return_assoc){
			return $findUser->fetch(PDO::FETCH_ASSOC);
		}

		$userFound = (int) $findUser->rowCount();
		return $user_found;
	}

	public static function SetEmail($new_email){
		/*
		echo $this->email;			// user's current email
		echo $this->user_id;		// current user's ID

		$updateEmail = $this->$con->prepare("UPDATE users SET email = LOWER(:new_email) WHERE user_id = :user_id LIMIT 1");
		$updateEmail->bindParam(':new_email', $new_email, PDO::PARAM_STR);
		$updateEmail->bindParam(':user_id', $this->user_id, PDO::PARAM_STR);
		$updateEmail->execute();
		*/
	}

}

?>