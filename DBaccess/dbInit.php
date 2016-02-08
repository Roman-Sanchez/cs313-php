<?php  
		$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

		if ($openShiftVar == null || $openShiftVar == "")
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
			$dbName = 'php';
			echo "host:$dbHost:$dbPort user:$dbUser password:$dbPassword<br />\n";
		}

		try{
			$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
		}
		catch (PDOException $ex) 
		{
		   echo 'Error!: ' . $ex->getMessage();
		   die(); 
		}
?>