<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	include('dbInit.php');
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Movies</title>
</head>
<body>
	<h3>These are the movies you own</h3>
	<?php
		foreach ($db->query('SELECT title FROM movie') as $row)
		{ 
			echo $row['title'];	
			echo '<br />';
		}
	?>
</body>
</html>