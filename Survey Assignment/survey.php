<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	/*$comedy = $_POST["q1"];
	$fantasy = $_POST["q2"];
	$action = $_POST["q3"];
	$guyFilm = $_POST["q4"];

	$movieData = array($comedy, $fantasy, $action, $guyFilm);*/
	
	// check to see if the method that was sent is a POST
	// step through each answer and add it append them to the results file
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$_SESSION["voted"] = true;
		$comedy = $_POST["q1"];
		$fantasy = $_POST["q2"];
		$action = $_POST["q3"];
		$guyFilm = $_POST["q4"];

		$movieData = array($comedy, $fantasy, $action, $guyFilm);
		foreach ($movieData as $movie)
		{
			if (file_exists("results.txt"))
			{
				file_put_contents("results.txt", "," . $movie, FILE_APPEND | LOCK_EX);
			}
			else
				file_put_contents("results.txt", $movie, FILE_APPEND | LOCK_EX);
		}
	}

	// read file contents into a string
	$results = file_get_contents("results.txt");

	// count how many times each movie is in the results file
	$numUHF = substr_count($results, "UHF");
	$numNutty = substr_count($results, "Nutty Professor");
	$numKrull = substr_count($results, "Krull");
	$numManos = substr_count($results, "Manos the hands of fate");
	$numMadMax = substr_count($results, "Mad Max: Fury Road");	
	$numAliens = substr_count($results, "Aliens");
	$numDirty = substr_count($results, "Dirty Harry");
	$numFather = substr_count($results, "The Godfather");

	// total number of votes for each category, these values will 
	$totalComedy = $numUHF + $numNutty;
	$totalFantasy = $numKrull + $numManos;
	$totalAction = $numMadMax + $numAliens;
	$totalGuyFilm = $numDirty + $numFather;


	$total = $numUHF + $numNutty + $numMadMax + $numAliens + $numDirty 
	+ $numFather + $numKrull + $numManos;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Results</title>
</head>
<body>
<h1>Survey results</h1><br/>
<div>
	
	<?php
		echo "<h3>Best Comedy</h3>";
		echo "Nutty Professor $numNutty votes<br/>";
		echo "UHF $numUHF votes<br/>";

		echo "<h3>Best Fantasy</h3>";
		echo "Krull $numKrull votes<br/>";
		echo "Manos the hands of fate $numManos votes<br/>";

		echo "<h3>Best Action</h3>";
		echo "Mad Max: Fury Road $numMadMax votes<br/>";
		echo "Aliens $numAliens votes<br/>";

		echo "<h3>Best Guy Film</h3>";
		echo "Dirty Harry $numDirty votes<br/>";
		echo "The Godfather $numFather votes<br/>";
	?>
	
</div>
</body>
</html>