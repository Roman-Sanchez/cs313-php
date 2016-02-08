<?php
  session_start();
  $_SESSION["userName"] = '';
  $_SESSION["pWord"] = '';
  $_SESSION["db"] = '';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="validateUser.php" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label class="sr-only">User Name</label>
        <input type="text" name = 'inputUserName' id="inputUserName" class="form-control" placeholder="User Name" required autofocus>
        <label id = "pWord" for="inputPassword" class="sr-only">Password</label>
        <input type="password" name = 'inputPassword' id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      <div align="center">Try it out with User Name: default Password: password</div>

    </div> <!-- /container -->
    <?php  
      /**try
      {
         $user = 'romanfs';
         $password = 'password'; 
         $db = new PDO('mysql:host=127.0.0.1;dbname=movietracker', 'romanfs', 'password');
      }
      catch (PDOException $ex) 
      {
         echo 'Error!: ' . $ex->getMessage();
         die(); 
      }**/
    ?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>