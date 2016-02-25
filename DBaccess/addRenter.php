<?php
	session_start();
	require 'sessionStatus.php';
	include('dbInit.php');
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Renter</title>
	<link rel="stylesheet" type="text/css" href="addButton.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
	<script src="bootstrap-datepicker.js"></script>
	<script> 
		$(function(){
		  $("#header").load("header.php");  
		});
	</script>
</head>
<body>
	<div id = "header"></div>
	<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Add Renter</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form action="#" method="POST" data-toggle="validator" >
		    				
		    				<div class="form-group">
		                		<input type="text" name="renterName" id="renterName" class="form-control input-sm" placeholder="Renter's Name" required autofocus>
		    				</div>

		    				<div class="form-group">
		                		<input type="text" name="renterMovie" id="renterMovie" class="form-control input-sm" placeholder="Movie" required autofocus>
		    				</div>

				            <div class="form-group">
				                <div class='input-group date' id='datetimepicker1'>
				                    <input type='text' id = "rentalDate" name="rentalDate" class="form-control input-sm" placeholder="yyyy-dd-mm" required />
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				            </div>

					        <script type="text/javascript">
					            $(function () {
					                $('#datetimepicker1').datetimepicker();
					            });
					        </script>
			    			
			    			<button type="submit" class="btn btn-info btn-block glyphicon glyphicon-plus"/>
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
    <?php
    	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    		$renterMovie = $_POST['renterMovie'];
    		$renterName = $_POST['renterName'];
    		$rentalDate = $_POST['rentalDate'];

    		echo "" . $renterName . " " . $renterMovie . " " . $rentalDate . "</br>";

    		// Check if user owns the movie they are trying to lend out
    		$stmt = $db->prepare("SELECT m.title, m.movieId, u.username
									FROM movie m
									JOIN ownership o ON o.movieId = m.movieId
									JOIN user u ON u.userId = o.userId
									WHERE m.title = :renterMovie AND u.userId = :userId");
    		$stmt->bindParam(":renterMovie", $renterMovie);
    		$stmt->bindParam(":userId", $_SESSION['userId']);
    		$stmt->execute();
    		$row = $stmt->fetchALL(PDO::FETCH_ASSOC);
    		

    		// if the number of rows in less than 0 then the user does not own the movie
    		// they are trying to lend out. This is not permitted
    		if($stmt->rowCount() > 0)
    		{
    			$movieId = $row[0]['movieId'];

    			$stmt2 = $db->prepare('INSERT INTO loaner(userId, movieId, borrower, rentalDate)
										VALUES(:userId, :movieId, :renterName, :rentalDate)');
    			$stmt2->bindParam(':userId', $_SESSION['userId']);
    			$stmt2->bindParam(':movieId', $movieId);
    			$stmt2->bindParam(':renterName', $renterName);
    			$stmt2->bindParam('rentalDate', $rentalDate);
    			if($stmt2->execute())
    			{
    				echo "Movie Rented";
    			}


    		}
    		else{
    			echo "You cannot lend out movies you do not own";
    		}
    		
    	}

      ?>
</body>
</html>