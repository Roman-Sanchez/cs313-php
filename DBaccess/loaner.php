<?php
	session_start();

	try 
		{
			$db = new PDO('mysql:host=127.0.0.1;dbname=movietracker', $_SESSION["userName"], $_SESSION["pWord"]);
		}
		catch (PDOException $ex) 
		{
		   echo 'Error!: ' . $ex->getMessage();
		   die(); 
		}

		$loanerQuery = "SELECT borrower, m\.title FROM loaner am
						INNER JOIN movie m ON am\.movieId = m\.title";
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
</head>
<body>
	<h3>Functionality coming soon...</h3>
	<?php
		/**foreach ($db->query($loanerQuery) as $row)
		{
			//echo 'user: ' . $row["username"];
			//echo ' Display Name: ' . $row['displayName']; 
			echo $row['title'];
			
			echo '<br />';
		}**/
	?>
</body>
</html>