<?php
	
	// if the session has not been set, set it and redirect to 
	// sign in page
	if (session_status() == PHP_SESSION_NONE) {
    	header( 'Location: signin.php');
    	session_start();
	}
?>