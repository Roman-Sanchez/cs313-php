<?php
	session_start();  
	/**$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

	if ($openShiftVar === null || $openShiftVar == "")
	{
	    // Not in the openshift environment
	    $dbName = 'movietracker';
	    $dbHost = 'localhost'; 
		// not need just yet $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
		$dbUser = 'romanfs'; 
		$dbPassword = 'password';
	}
	else 
	{
	    // In the openshift environment 
		$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST'); 
		$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
		$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); 
		$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
	}**/

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{	
		$option = $_POST['selectOption'];
		
		if ($option == "user") {
			//$userQuery = "SELECT username, displayName FROM user";
			header( 'Location: user.php' );
		}
		elseif ($option == "movie") {
			//$userQuery = "SELECT title FROM movie";
			header( 'Location: movie.php' );
		}
		elseif ($option == "loaner") {
			# code...
			//$userQuery = "SELECT borrower, rentalDate FROM loaner";
			header( 'Location: loaner.php' );
		}


	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Database results</title>
</head>
<body>
	<a href="signin.php">Return to sign in</a>	
</body>
</html>