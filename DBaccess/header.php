<?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Generic Header</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="table.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="navbar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="movie.php">The Phoenix Renter's Club</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="movie.php">My Movies</a></li>
          <li><a href="loaner.php">Rented Out</a></li>
          <li><a href="#">Popular Movies</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          
          <?php
              echo "<li><a><span>Welcome: " . $_SESSION["displayName"] . "</span></a></li>";
            ?>
          <li><a href="signOut.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
          <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </div>
  </nav> 

</body>
</html>