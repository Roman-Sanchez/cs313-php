<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>DB ACCESS</title>
</head>
<body>
	<h1>Database info</h1>
	<div>
		<form action="dbresults.php" method="POST">
			<h3>What do you want to see in the Database?</h3>
			<select name="selectOption">
				<option value="movie">Movies</option>
				<option value="loaner">Rental Information</option>
			</select>
			<button type="submit">Submit</button>
		</form>
	</div>
</body>
</html>