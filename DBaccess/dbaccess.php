<?php
	session_start();
	require 'sessionStatus.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>DB ACCESS</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sidebar.css">
    <script type="text/javascript" src="sidebar.js" ></script>
</head>
<body>
	<h1>Database info</h1>
	<!--<div>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a id="menu-toggle" href="#" class="navbar-toggle">
						<span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				</a>
	  			<a class="navbar-brand" href="home.xhtml">
	  				logo
	  			</a>
			</div>
			<div id="sidebar-wrapper" class="sidebar-toggle">
				<ul class="sidebar-nav">
			    	<li>
			      		<a href="#item1">Item 1</a>
			    	</li>
			    	<li>
			      		<a href="#item2">Item 2</a>
			    	</li>
			    	<li>
			      		<a href="#item3">Item 3</a>
			    	</li>
			  	</ul>
			</div>
	  	</div>
	</nav>
	</div>-->
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