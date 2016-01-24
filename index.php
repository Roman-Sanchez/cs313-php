<!DOCTYPE html>
<html lang="en">
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="homepage.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
	  	<div class="container-fluid">
	    	<div class="navbar-header">
	      	<a class="navbar-brand" href="#">Roman Sanchez</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Home</a></li>
	      <li><a href="assignments.php">Assignments</a></li>
	      <li><a href="#">Coding Samples</a></li> 
	      <li><a href="about.php">About</a></li> 
	    </ul>
	  </div>
	</nav>
	<div id="slideCarousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#slideCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#slideCarousel" data-slide-to="1"></li>
			<li data-target="#slideCarousel" data-slide-to="2"></li>
		</ol>

		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img class="resize img-rounded" src="duck_faces.jpg" alt="Ducks">
			</div>

			<div class="item">
				<img class="resize img-rounded" src="Mexico_Hauling_the_net.jpg" alt="Mexico">
			</div>

			<div class="item">
				<img class="resize img-rounded" src="Bow_Fishing.jpg" alt="Bow Fishing">
			</div>
		</div>

		<a class="left carousel-control" href="#slideCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>

		<a class="right carousel-control" href="#slideCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</body>
</html>