<?php
	session_start();
	require 'sessionStatus.php';
	require 'password.php';
	include("dbInit.php");
	/**if (!isset($_SESSION)) {
		session_start();
	}**/
	//ini_set('display_errors', 1);
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// set the session variables from the form
		$userName = $_POST['inputUserName'];
		$pWord = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);
		$_SESSION["userName"] = $userName;
		$_SESSION["pWord"] = $_POST['inputPassword'];

		// Prepare validation statement
		$stmt = $db->prepare("SELECT username FROM user WHERE username = :name");
		$stmt->bindParam(':name', $userName);
		$stmt->execute();

		// Get the password from the DB
		$stmt2 = $db->prepare("SELECT password FROM user WHERE username = :name");
		$stmt2->bindParam(':name', $userName);
		$stmt2->execute();
		$passwordResult = $stmt2->fetchAll(PDO::FETCH_ASSOC);
		
		// Get the userId from the DB
		$stmt3 = $db->prepare("SELECT userId FROM user where username = :name");
		$stmt3->bindParam(':name', $userName);
		$stmt3->execute();
		$userId = $stmt3->fetchAll(PDO::FETCH_ASSOC);

		print_r($userId[0]['userId']);
		// Checking if user is in DB; if not, redirects to the sign in page.
		if ($stmt->rowCount() > 0) {
			
			if (password_verify($_SESSION['pWord'], $passwordResult[0]['password'] ))
			{
				$_SESSION["userId"] = $userId[0]['userId'];
				header('Location: movie.php');
			}
			else
			{
				header('Location: signin.php');
			}

		}
		else{
			header( 'Location: signin.php' ); 
		}


	}
	else {
		header( 'Location: signin.php');
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