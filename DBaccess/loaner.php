<?php  
	session_start();
	require 'sessionStatus.php';
	include('dbInit.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="addButton.css">
	<link rel="stylesheet" type="text/css" href="table.css">

	<title>Renters</title>
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script> 
		$(function(){
		  $("#header").load("header.php");  
		});
	</script>
</head>
<body style="font-family: 'Montserrat', sans-serif">
	<div id = "header"></div>
	
	<?php
		// Show who has borrowed which movies
		$stmt = $db->prepare("SELECT l.borrower, l.rentalDate, l.returnDate, u.username, m.title FROM loaner l
								JOIN user u ON u.userId = l.userId
								JOIN movie m ON m.movieId = l.movieId
								WHERE l.userId = :userId
								ORDER BY m.title");
		$stmt->bindParam(':userId', $_SESSION['userId']);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Table to display all the movies the user has lent out and who rented
		// them.
		echo "<div align=\"center\">";
		echo "<table class=\"rwd-table\" align=\"center\">";
		echo "	  <tr>";
		echo "		<th>Movie Title</th>";
		echo "		<th>Renter</th>";
		echo "		<th>Date</th>";
		echo "	  </tr>";

		// Step through the database and display the information for each movie
		// and the person who has rented the movie
		foreach ($row as $key) {

			echo "	  <tr>";
			echo "	    <td data-th=\"Movie Title\">" . $key['title'] . "</td>";
			echo "	    <td data-th=\"Renter\">" . $key['borrower'] . "</td>";
			echo "	    <td data-th=\"Date\">" . $key['rentalDate'] . "</td>";
			echo "	  </tr>";

		}
		// Close the table
		echo"</table>";
		echo "</div>";

	?>

	<div align="center">
		<a href="addRenter.php"><button type="button" class="btn btn-info btn-circle btn-xl" ><i class="glyphicon glyphicon-plus"></i></button></a>
	</div>
</body>
</html>