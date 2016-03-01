<?php  
	include('dbInit.php');
	require "pasword.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--Scripts for header -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script> 
		$(function(){
		  $("#header").load("navbarSignInSignUp.php");  
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
			    		<h3 class="panel-title">Please sign up</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form action="#" method="POST" data-toggle="validator" >
			    				<div class="form-group">
			                		<input type="text" name="displayName" id="displayName" class="form-control input-sm" placeholder="Name" required autofocus>
			    				</div>

			    			<div class="form-group">
			    				<input type="text" name="userName" id="userName" class="form-control input-sm" placeholder="User Name" required>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="confirm_password" id="confirm_password" class="form-control input-sm" placeholder="Confirm Password" required>
			    					</div>
			    				</div>
			    			</div>

			    			
			    			<input type="submit" value="Register" class="btn btn-info btn-block"/>
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
    
    <!-- Create put user into database --> 
    <?php
    	echo "Inside PHP";  
    	if($_SERVER['REQUEST_METHOD'] == 'POST')
    	{
    		echo "The Method is POST </br>";
    		$userName = $_POST['userName'];
	    	$displayName = $_POST['displayName'];
	    	$pWord = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);

	    	$stmt = $db->prepare("SELECT username FROM user WHERE username = :name");
			$stmt->bindParam(':name', $userName);
			$stmt->execute();

			echo "The Method is POST </br>";

			if ($stmt->rowCount() > 0)
			{
				echo "Please choose another User Name";
			}
			else
			{
				//add user

				// build insert statement
				/**$stmt = $db->prepare("INSERT INTO user(username, displayName, password) VALUES(:userName, :displayName, :pWord)");
				$stmt->bindParam(':userName', $userName);
				$stmt->bindParam(':displayName', $displayName);
				$stmt->bindParam(':pWord', $pWord);
				$stmt->execute();
				**/
				echo "Trying to add new user";
				$stmt = $db->prepare("INSERT INTO user(username, displayName, password) VALUES('test', 'test', 'test')");
				$stmt->execute();
				header('Location: signin.php');
			}

    	}
    ?>
</body>
</html>