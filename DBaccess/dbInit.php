<?php  
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$userName = $_POST['inputUserName'];
		$pWord = $_POST['inputPassword'];
		$_SESSION["userName"] = $userName;
		$_SESSION["pWord"] = $pWord;
	}
		$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');
		$inOpenshift = false;

		if ($openShiftVar == null || $openShiftVar == "")
		{
			$inOpenshift = false;
		    // Not in the openshift environment
		    $dbName = 'movietracker';
		    $dbHost = '127.0.0.1';  
			$dbUser = 'romanfs'; 
			$dbPassword = 'password';
		}
		else 
		{
			$inOpenshift = true;
		    // In the openshift environment 
			$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST'); 
			$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
			$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); 
			$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
			$dbName = 'php';
		}

		try{
			if($inOpenshift){
				$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
			}
			else {
				$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
			}
		}
		catch (PDOException $ex) 
		{
		   echo 'Error!: ' . $ex->getMessage();
		   die(); 
		}
?>