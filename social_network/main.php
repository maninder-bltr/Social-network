<!DOCTYPE html>
<html>
<head>
	<title>Login and Signup</title><meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
 <style>
 	body{
 		overflow-x:hidden;
 	}
 	#centered1{
 		position:absolute;
 		font-size: 5vw;
 		top:20%;
 		left:70%;
 		transform:translate(-50%,-50%);
 	}
 	#centered2{
 		position:absolute;
 		font-size: 5vw;
 		top:50%;
 		left:70%;
 		transform:translate(-50%,-40%);
 	}
 	#centered3{
 		position:absolute;
 		font-size: 5vw;
 		top:90%;
 		left:90%;
 		transform:translate(-50%,-100%);
 	}
 	#signup{
 		width: 60%;
 		border-radius: 30px;
 	}
 	#login{
 		width: 60%;
 		background-color: #fff;
 		border: 1px solid #1da1f2;
 		color:#1da1f2;
 		border-radius: 30px; 
 	}
 	#login:hover{
 		width: 60%;
 		background-color: #fff;
 		border: 1px solid #1da1f2;
 		color:#1da1f2;
 		border-radius: 30px; 
 	}
 	.well{
 		background-color: #187fab;
 	}
 </style>
<body>
<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<center><h1 style="color: white;">Social Network</h1><h5 style="color: white;">by MKS</h5></center>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-1" align="left" style="left:0.5%;">
		<img src="images/networking.jpg"  class="img-rounded" title="coding cafe" width="650px" height="565px">
		<div id="centered1" class="centered"><h3 style="color:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>Follow your interest</strong></h3>	
		</div>
		<div id="centered2" class="centered"><h3 style="color:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>Hear what people are talking about</strong></h3>	
		</div>
		<div id="centered3" class="centered"><h3 style="color:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>Join the conversation</strong></h3>	
		</div>
		</div>
		<div class="col-sm-7" align="right" style="left:30%;">
			<img src="images/image2.png" alt="" class="img-rounded" title="coding cafe" width="80px" height="80px">
			<h2><strong>See What's Happening in<br>the World Right Now</strong></h2><br><br>
			<h4><strong>Join Social Network Today.</strong></h4>
			<form action="" method="post">
				<button type="" id="signup" class="btn btn-info btn-lg" name="signup">Sign up</button><br><br>
				<?php  
				if(isset($_POST['signup'])){
					echo"<script>window.open('signup.php','_self')</script>";
				}
				 ?>
				 <button type="" id="login" class="btn btn-info btn-lg" name="login">Login</button><br><br>
				<?php  
				if(isset($_POST['login'])){
					echo"<script>window.open('signin.php','_self')</script>";
				}
				 ?>
				
			</form>
	
	</div>
	
</div>

</body>
</html>