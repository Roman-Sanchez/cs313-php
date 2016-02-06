<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$userName = $_POST['inputUserName'];
		$pWord = $_POST['inputPassword'];
		$_SESSION["userName"] = $userName;
		$_SESSION["pWord"] = $pWord;

		var_dump($_SESSION["userName"]);


		try{
			$db = new PDO('mysql:host=127.0.0.1;dbname=movietracker', 'root', '');
		}
		catch (PDOException $ex) 
		{
		   echo 'Error!: ' . $ex->getMessage();
		   die(); 
		}

		var_dump($userName);
		var_dump($pWord);

		// Prepare vaildation statement
		$stmt = $db->prepare("SELECT User FROM mysql.user WHERE user = :name");
		$stmt->bindParam(':name', $userName);
		$stmt->execute();

		var_dump($stmt);
		var_dump($stmt->rowCount());
		if ($stmt->rowCount() > 0) {
			header( 'Location: dbaccess.php' ); 
		}
		else{
			header( 'Location: signin.php' ); 
		}
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