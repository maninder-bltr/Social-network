<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="">
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
	#signup{
		width: 60%;
		border-radius: 30px;

	}
</style>
<body>
<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<center><h1 style="color: white;">Social Network</h1><h5 style="color: white;">by MKS
</h5></center>
		</div>
	</div>
</div>
<div class="row" align="center">
	<div class="col-sm-12">
		<div class="main-content">
		<div class="header">
<h3 style="text-align: center;"><strong>Join Social Network</strong></h3><hr>	
		</div>
		<div class="1-part">
			<form action="" method="POST">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i> </span>
				<input type="text"  class="form-control" name="first_name" value="" placeholder="First name" required="required">
			</div><br>

				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i> </span>
				<input type="text"  class="form-control" name="last_name" value="" placeholder="Last name" required="required">
			</div><br>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> </span>
				<input id="password" type="password"  class="form-control" name="u_pass" value="" placeholder="Password" required="required">
			</div><br>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> </span>
				<input id="email" type="email"  class="form-control" name="u_email" value="" placeholder="Email" required="required">
			</div><br>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i> </span>
				<select class="form-control" name="u_country" required="required" >
					<option disabled>Select your State</option>
					<option>West-bengal</option>
					<option>Uttar pradesh</option>
					<option>Bihar</option>
					<option>Jharkhand</option>
					<option>Assam</option>
					<option>Punjab</option>
				</select>
			</div><br>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i> </span>
				<select class="form-control input-md" name="u_gender" required="required">
					<option disabled>Select Your Gender</option>
					<option>Male</option>
					<option>Female</option>
					<option>Others</option>
				</select>
			</div><br>

			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> </span>
				<input type="date" class="form-control" name="u_birthday" value="" placeholder="Date of Birth" required="required">
			</div><br>
			<a style="text-decoration: none;float: right;color: #187fab;" data-toggle="toooltip" title="signin" href="signin.php" title="">Already have an account?</a><br><br>
			<center><button id="signup" class="btn btn-info btn-lg" name="sign_up" type="submit" >Sign up</button></center>
			<?php include("insert_user.php"); ?> 
			</form>
		</div>
		</div>
	</div>
</div>
</body>
</html>