<?php 
	//if there is no constant defined named __CONFIG__ do not load this file
	if(!defined('__CONFIG__')){
		exit('You do not have a config file');
		//ideally, redirect or 404 error
	}

	//following code only runs if __CONFIG__ is defined ie. from an intended page like index.php

?>