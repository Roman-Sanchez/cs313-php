<?php
	session_start();
	var_dump($_SESSION["userName"]);
	var_dump($_SESSION["pWord"]);
	try 
		{
			$db = new PDO('mysql:host=127.0.0.1;dbname=movietracker', $_SESSION["userName"], $_SESSION["pWord"]);
		}
		catch (PDOException $ex) 
		{
		   echo 'Error!: ' . $ex->getMessage();
		   die(); 
		}
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
</head>
<body>
	<?php
		foreach ($db->query('SELECT title FROM movie') as $row)
		{
			//echo 'user: ' . $row["username"];
			//echo ' Display Name: ' . $row['displayName']; 
			echo $row['title'];
			
			echo '<br />';
		}
	?>
</body>
</html>