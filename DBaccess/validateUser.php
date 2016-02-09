<?php
	session_start();
	include("dbInit.php");
	/**if (!isset($_SESSION)) {
		session_start();
	}**/
	//ini_set('display_errors', 1);
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$userName = $_POST['inputUserName'];
		$pWord = $_POST['inputPassword'];
		$_SESSION["userName"] = $userName;
		$_SESSION["pWord"] = $pWord;

		var_dump($userName);
		var_dump($pWord);
	
	 //moving this to dbInit.php can be deleted later
 	/**if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$userName = $_POST['inputUserName'];
		$pWord = $_POST['inputPassword'];
		$_SESSION["userName"] = $userName;
		$_SESSION["pWord"] = $pWord;


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
		}**/

		// Prepare vaildation statement
		$stmt = $db->prepare("SELECT User FROM mysql.user WHERE user = :name");
		$stmt->bindParam(':name', $userName);
		$stmt->execute();

		var_dump($stmt);
		var_dump($stmt->rowCount());
		
		// Checking if user is in DB; if not, redirects to the sign in page.
		/**if ($stmt->rowCount() > 0) {
			header( 'Location: dbaccess.php' ); 
		}
		else{
			header( 'Location: signin.php' ); 
		}**/
		header( 'Location: dbaccess.php');
	}
  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>