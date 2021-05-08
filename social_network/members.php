<!DOCTYPE html>
 <?php 
session_start();
include("includes/header.php");
if(!isset($_SESSION['user_email'])){
	header("location:index.php");

}
 ?>
<html>
<head>
	<title>Find People    :)</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body>
<div class="row">
	<div class="col-sm-12"><center><h2>Find New People</h2></center></div><br><br>
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<form action="" class="search_form" accept-charset="utf-8">
			<input type="text" name="search_user" value="" placeholder="search friend">	
			<button class="btn btn-info" type="submit" name="search_user_btn">search</button>
			</form>
		</div>
		<div class="col-sm-4"></div>
	</div><br><br>
	<?php search_user(); ?>
</div>
</body>
</html>