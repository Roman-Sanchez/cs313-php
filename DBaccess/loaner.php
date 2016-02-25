<?php  
	session_start();
	require 'sessionStatus.php';
	include('dbInit.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Renters</title>
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
	<div align="center">
		<a href="addRenter.php"><button type="button" class="btn btn-info btn-circle btn-xl" ><i class="glyphicon glyphicon-plus"></i></button></a>
	</div>
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

		foreach ($row as $key) {
			echo "" . $key['title'] . "</br>";
			echo "Lent to: " . $key['borrower'] . " </br>";
			echo "On: " . $key['rentalDate'] . " </br>";
			echo "Returned: " . $key['returnDate'] . "</br>";
			echo "</br>";
			echo "</br>";
		}

	?>

	<div align="center">
		<a href="addRenter.php"><button type="button" class="btn btn-info btn-circle btn-xl" ><i class="glyphicon glyphicon-plus"></i></button></a>
	</div>
</body>
</html>