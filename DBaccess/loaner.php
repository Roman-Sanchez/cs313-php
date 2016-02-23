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
</body>
</html>