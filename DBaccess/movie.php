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
	<?php
		foreach ($db->query('SELECT title FROM movie') as $row)
		{ 
			echo $row['title'];	
			echo '<br />';
		}
	?>
</body>
</html>