<?php

  if (!isset($_SESSION))
  {
    session_start();
    $_SESSION["voted"] = 0;
    $voted = $_SESSION["voted"];
  }

  if ($voted != 0) 
  {
    header('Location: survey.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PHP SURVEY</title>

    <!-- Bootstrap -->
    <link href="../bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div>
      <h1>Movie Survey</h1>

      <div>
        <div class="form-group">
          <form action="survey.php" method="POST">
            <div class="">Best comedy film</div>
            <div><input type="radio" name="q1" id="q1" value="UHF" checked="checked">UHF</div>
            <div><input type="radio" name="q1" id="q1" value="Nutty Professor">Nutty Professor (1963)</div>
            <br/>

            <div class="">Best fantasy film</div>
            <div><input type="radio" name="q2" id="q2" value="Krull" checked="checked">Krull</div>
            <div><input type="radio" name="q2" id="q2" value="Manos the hands of fate">Manos the hands of fate</div>
            <br/>

            <div class="">Best action film</div>
            <div><input type="radio" name="q3" id="q3" value="Mad Max: Fury Road" checked="checked">Mad Max: Fury Road</div>
            <div><input type="radio" name="q3" id="q3" value="Aliens">Aliens</div>
            <br/>

            <div class="">Best guy film</div>
            <div><input type="radio" name="q4" id="q4" value="Dirty Harry" checked="checked">Dirty Harry</div>
            <div><input type="radio" name="q4" id="q4" value="The Godfather">The Godfather</div>
            <br/>

            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <div>
      <a href="survey.php"> See results </a>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
  </body>
</html>