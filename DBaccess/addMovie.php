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
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script> 
		$(function(){
		  $("#header").load("header.php");  
		});
	</script>
</head>
<body style="font-family: 'Montserrat', sans-serif">
	<div id = "header"></div>
	<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Add New Movie to Your Library</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form action="#" method="POST" data-toggle="validator" >
		    				
		    				<div class="form-group">
		                		<input type="text" name="newMovie" id="newMovie" class="form-control input-sm" placeholder="Title" required autofocus>
		    				</div>
			    			
			    			<button type="submit" class="btn btn-info btn-block glyphicon glyphicon-plus"/>
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
    <?php
    	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    		$newMovie = $_POST['newMovie'];

    		// check is movie exists in DB
    		$oldMovie = $db->prepare('SELECT title, movieId FROM movie WHERE title = :newTitle');
    		$oldMovie->bindParam(':newTitle', $newMovie);
    		$oldMovie->execute();
    		$oldMovieResults = $oldMovie->fetchALL(PDO::FETCH_ASSOC);

    		// Check if user already owns the movie
    		$previousOwnership = $db->prepare('SELECT m.title
												FROM movie m
												JOIN ownership o ON o.movieId = m.movieId
												JOIN user u ON u.userId = o.userId
												WHERE m.title = :newTitle');
    		$previousOwnership->bindParam(':newTitle', $newMovie);
    		$previousOwnership->execute();
    		
    		if ($oldMovie->rowCount() > 0 && $previousOwnership->rowCount() != 0) {

    			// use movie that was previously in the DB and set ownership to that movie
    			$stmt2 = $db->prepare('INSERT INTO ownership(userId, movieId) VALUES(:userId, :movieId)');
	    		$stmt2->bindParam(':userId', $_SESSION['userId']);
	    		$stmt2->bindParam(':movieId', $oldMovieResults[0]['movieId']);
	    		$stmt2->execute();

    		}
    		elseif ($oldMovie->rowCount() <= 0)
    		{
	    		// Insert new film into DB
	    		$stmt = $db->prepare('INSERT INTO movie(title) VALUES(:title)');
	    		$stmt->bindParam(':title', $newMovie );
	    		$stmt->execute();

	    		$movieStmt = $db->prepare('SELECT movieId FROM movie WHERE title = :newTitle');
	    		$movieStmt->bindParam(':newTitle', $newMovie);
	    		$movieStmt->execute();
	    		$movieId = $movieStmt->fetchALL(PDO::FETCH_ASSOC);

	    		// insert into ownership.
	    		$stmt2 = $db->prepare('INSERT INTO ownership(userId, movieId) VALUES(:userId, :movieId)');
	    		$stmt2->bindParam(':userId', $_SESSION['userId']);
	    		$stmt2->bindParam(':movieId', $movieId[0]['movieId']);
	    		if ($stmt2->execute())
	    		{

	    			echo "Movie Added";
	    		}
	    		
    		}
    		else {
    			echo "You Already own this movie </br>";
    		}
    		
    	}

      ?>
</body>
</html>