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
	<?php 
	        $user=$_SESSION['user_email'];
 			$get_user="select * from `users` where `user_email`='$user' ";
 			$run_user=mysqli_query($con,$get_user);
 			$row=mysqli_fetch_array($run_user);
 			$user_name=$row['user_name'];

	 ?>
	<title><?php echo "$user_name"; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body>

<div class="row">
    <center>
	<div id="insert_post" class="col-sm-12">
		<form action="home.php?id=<?php echo $user_id; ?>" method="post" id="f" enctype="multipart/form-data" accept-charset="utf-8">
	    <textarea name="content" class="form-control" id="content" rows="4" placeholder="What's in ur Mind?"></textarea><br>
	    <label class="btn btn-warning" id="upload_image_button">Select image
	    	<input type="file" name="upload_image" size="30" value="" placeholder=""></label>
			<button id="btn-post" class="btn btn-success" name="sub">Post</button>
		</form>
		<?php insertPost();  ?>
      </div>
	</center>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<center>
				<h2><strong>News Feed</strong></h2>
			</center>
			<?php echo get_posts(); ?>
		</div>
	</div>
</body>
</html>