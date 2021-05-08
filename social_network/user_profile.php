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
	<title>find people</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
#own_posts{
	border: 5px solid #e6e6e6;
	padding: 40px 50px;
	width: 70%;
}	
#posts_img{
	height: 300px;
	width: 100%;
}
</style>
<body>
<div class="row">
	<?php
     if(isset($_GET['u_id'])){
     $u_id=$_GET['u_id'];
      }
     if($u_id < 0 || $u_id==""){
     echo"<script> window.open('home.php','_self')></script>";
     }else{
     ?>
     <div class="col-sm-12">
     	<?php
     	if(isset($_GET['u_id'])){
     	global $con;
     	$user_id=$_GET['u_id'];
     	$select="select * from `users` where `user_id`='user_id'";
     	$run=mysqli_query($con,$select);
     	$row=mysqli_fetch_array($run);
     	$name=$row['user_name'];

     }
     ?>
     <?php
     if(isset($_GET['u_id'])){
     global $con;
     $user_id=$_GET['u_id'];
     $select="select * from `users` where `user_id`='$user_id'";
     $run=mysqli_query($con,$select);
     $row=mysqli_fetch_array($run);
     $id=$row['user_id'];
     $image=$row['user_image'];
     $name=$row['user_name'];
     $f_name=$row['f_name'];
     $l_name=$row['l_name'];
     $describe_user=$row['describe_user'];
     $country=$row['user_country'];
     $gender=$row['user_gender'];
     $register_date=$row['user_reg_date'];
     echo"
     <div class='row'>
     	<div class='col-sm-1'>
     	</div>
     	<center>
     		<div class='col-sm-3' style='background-color:#e6e6e6;'>
     		<h2>information about</h2>
     		<img class='img-circle' src='users/$image' width='150' height='150'><br><br>
     		<ul class='list-group'>
     			<li class='list-group-item' title='username'><strong>$f_name $l_name</strong></li>
     			<li class='list-group-item' title='user status'><strong style='color: grey;'>$describe_user</strong></li>
     			<li class='list-group-item' title='gender'><strong>$gender</strong></li>
     			<li class='list-group-item' title='user_country'><strong>$country</strong></li>
     			<li class='list-group-item' title='user registration date'><strong>$register_date</strong></li>
     		</ul>
  
     ";
     $user=$_SESSION['user_email'];
     $get_user="select * from `users` where `user_email`='$user'";
     $run_user=mysqli_query($con,$get_user);
     $row=mysqli_fetch_array($run_user);
     $userown_id=$row['user_id'];
     if($user_id==$userown_id){

     echo"<a href='edit_profile.php?u_id=$userown_id' class='btn btn-success'>edit profile</a><br><br>";
   }
     echo"
      </div>
      </center>
      ";

     }

     ?>

    <div class="col-sm-8">
    	<center><h1><strong><?php echo"$f_name $l_name "; ?></strong> Posts </h1></center>
    	<?php
         global $con;
         if(isset($_GET['u_id'])){
         $u_id=$_GET['u_id'];
     }
     $get_posts="select * from `posts` where `user_id`='$u_id' ORDER by 1 DESC LIMIT 5";
     $run_posts=mysqli_query($con,$get_posts);
     while($row_posts=mysqli_fetch_array($run_posts)){
     $post_id=$row_posts['post_id'];
     $user_id=$row_posts['user_id'];
     $content=$row_posts['post_content'];
     $upload_image=$row_posts['upload_image'];
     $post_date=$row_posts['post_date'];

     $user="select * from `users` where `user_id`='$user_id' AND `posts`='yes' ";
     $run_user=mysqli_query($con,$user);
     $row_user=mysqli_fetch_array($run_user);
     $user_name=$row_user['user_name'];
     $f_name=$row_user['f_name'];
     $l_name=$row_user['l_name'];
     $user_image=$row_user['user_image'];

     if($content=="No" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6' style='padding-left: 60px;'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>		$user_name</a></h3>
							<h4><small style='color:black;'>		Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6' style='padding-left: 60px;'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>		$user_name</a></h3>
							<h4><small style='color:black;'>		Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6' style='padding-left: 60px;'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>		$user_name</a></h3>
							<h4><small style='color:black;'>		Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<h3><p>$content</p></h3>
						</div>
					</div><br>
					
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

 }

    	?>
    </div>

     </div>
</div>
</div>
<?php } ?>
</body>
</html>