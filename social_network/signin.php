<!DOCTYPE html>
<html>
<head>
	<title>signin</title>
	<<meta  charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
body{
		overflow-x:hidden;
	}
	.main-content{
		width: 50%;
		height: 40%;
		margin;10px auto;
		background-color: #fff;
		border:2px solid #e6e6e6;
		padding:40px 50px;
	}
	.header{
		border:0px solid #000;
		margin-bottom:5px;
	}
	.well{
		background-color: #187fab;
	}
	#signin{
		width: 60%;
		border-radius: 30px;

	}
	.overlap-text{
		position: relative;
	}	
	.overlap-text a{
		position:absolute;
		top: 8px;
		right:10px;
		font-size: 14px;
		text-decoration:none;
		font-family: 'Overpass mono',monospace;
		letter-spacing: -1px; 
	}
</style>
<body>
 <div class="row">
 	<div class="col-sm-12">
 		<div class="well">
 			<center><h1 style="color: white;">Social Network</h1></center>
 		</div>
 	</div>
 </div>
 <div class="row" align="center">
 	<div class="col-sm-12">
 		<div class="main-content">
 			<div class="header">
 				<h3 style="text-align: center;"><strong>Login to Social Network</strong></h3>
 			</div>
 			<div class="1-part">
 				<form action="" method="post">
 					<input type="text" name="email" value="" placeholder="Email" required="required" class="form-control input-md"><br>
 					<div class="overlap-text">
 						<input type="password" name="pass" value="" placeholder="Password" required="required" class="form-control input-md"><br>
 						<a href="forgot_password.php" style="text-decoration: none; float: right;color: #187fab;" data-toggle="tooltip" title="reset password">forgot password?</a> 
 					</div>
 					<a style="text-decoration:none;float: right;color: #187fab;" data-toggle="tooltip" title="create account" href="signup.php">don't have an account</a>
 					<center><button type="" id="signin" class="btn btn-info btn-lg" name="login">Login</button></center> 
 					<?php include("login.php"); ?>
 				</form>
 			</div>
 		</div>
 	</div>
 	
 </div>
</body>
</html>