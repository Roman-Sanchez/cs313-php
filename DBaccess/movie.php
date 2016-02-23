<?php
	session_start();
	require 'sessionStatus.php';
	include('dbInit.php');
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Movies</title>
	<link rel="stylesheet" type="text/css" href="addButton.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script> 
		$(function(){
		  $("#header").load("header.php");  
		});
	</script>
</head>
<body>
<div id = "header"></div>
	<h3>These are the movies you own</h3>
	
	<!--Prepare the query and display the results-->
	<?php

		$stmt = $db->prepare("SELECT m.title FROM movie m JOIN ownership o ON o.movieId = m.movieId JOIN user u ON u.userId = o.userId WHERE u.userId = :userId");
		$stmt->bindParam(':userId', $_SESSION['userId']);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($row as $key) {
			echo "" . $key['title'] . "</br>";
		}

	?>
	<div align="center">
		<a href="addMovie.php"><button type="button" class="btn btn-info btn-circle btn-xl" href="addMovie.php"><i class="glyphicon glyphicon-plus"></i></button></a>
	</div>
</body>
</html>