<?php
	if (!isset($_SESSION)) {
		session_start();
	}
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
	<title>Movies</title>
</head>
<body>
	<?php
		foreach ($db->query('SELECT title FROM movie') as $row)
		{ 
			echo $row['title'];	
			echo '<br />';
		}
	?>
</body>
</html>