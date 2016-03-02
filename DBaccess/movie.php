<?php
	session_start();
	require 'sessionStatus.php';
	include('dbInit.php');
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Movies</title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="addButton.css">
	<link rel="stylesheet" type="text/css" href="table.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script> 
		$(function(){
		  $("#header").load("header.php");  
		});
	</script>
</head>
<body style="font-family: 'Montserrat', sans-serif">
	<div id = "header"></div>
	
	
	<!--Prepare the query and display the results-->
	<?php

		$stmt = $db->prepare("SELECT m.title FROM movie m JOIN ownership o ON o.movieId = m.movieId JOIN user u ON u.userId = o.userId WHERE u.userId = :userId");
		$stmt->bindParam(':userId', $_SESSION['userId']);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

		echo "<div align=\"center\">";
		echo "<h1>Movies you own</h1>";
		echo "<table class=\"rwd-table\" align=\"center\">";
		echo "	  <tr>";
		echo "		<th>Movie Title</th>";
		echo "	  </tr>";

		// Step through the database and display the information for each movie
		foreach ($row as $key) {

			echo "	  <tr>";
			echo "	    <td data-th=\"Movie Title\">" . $key['title'] . "</td>";
			echo "	  </tr>";

		}
		// Close the table
		echo"</table>";
		echo "</div>";


	?>
	<div align="center">
		<a href="addMovie.php"><button type="button" class="btn btn-info btn-circle btn-xl" href="addMovie.php"><i class="glyphicon glyphicon-plus"></i></button></a>
	</div>
</body>
</html>