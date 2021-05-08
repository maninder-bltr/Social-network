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
	<title>Messages</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
#scroll_messages{
	max-height: 500px;
	overflow: scroll;
}	
#btn-msg{
	width: 20%;
	height: 28px;
	border-radius: 5px;
	margin: 5px;
	border: none;
	color: #fff;
	float: right;
	background-color: #2ecc71;
}
#select_user{
	max-height: 500px;
	overflow: scroll;
}
#green{
	background-color: #2ecc71;
	border-color: #27ae60;
	width: 45%;
	padding: 2.5px;
	font-size: 17px;
	border-radius: 3px;
	float: left;
	margin-bottom: 5px;
}
#blue{
	background-color: #3498db;
	border-color: #2980b9;
	width: 45%;
	padding: 2.5px;
	font-size: 17px;
	border-radius: 3px;
	float: right;
	margin-bottom: 5px;
}


</style>
<body>
<div class="row">
	<?php
     if(isset($_GET['u_id'])){
     global $con;
     $get_id=$_GET['u_id'];
     $get_user="select * from `users` where `user_id`='$get_id'";
     $run_user=mysqli_query($con,$get_user);
     $row_user=mysqli_fetch_array($run_user);
     $user_to_msg=$row_user['user_id'];
     $user_to_name=$row_user['user_name'];

 }
 $user=$_SESSION['user_email'];
 $get_user="select * from `users` where `user_email`='$user'";
 $run_user=mysqli_query($con,$get_user);
 $row=mysqli_fetch_array($run_user);
 $user_from_msg=$row['user_id'];
 $user_from_name=$row['user_name'];
    
	?>
	<div class="col-sm-3" id="select_user">
		<?php

       $user="select * from `users`";
       $run_user=mysqli_query($con,$user);
       while($row_user=mysqli_fetch_array($run_user)){
       $user_id=$row_user['user_id'];
       $user_name=$row_user['user_name'];
       $first_name=$row_user['f_name'];
       $last_name=$row_user['l_name'];
       $user_image=$row_user['user_image'];
       echo"
       <div class='container-fluid'>
       	<a href='messages.php?u_id=$user_id' style='text-decoration: none; cursor: pointer;color: #3897f0;'>
       	<img src='users/$user_image' width='90px' class='img-circle' height='80px' title='$user_name'><strong>
       		&nbsp $first_name
       	</strong><br><br>
       	</a>
       </div>
       ";
   }
		?>
	</div>
	<div class="col-sm-6">
		<div class="load_msg" id="scroll_messages">
			
			<?php
            $sel_msg="select * from `user_messages` where (`user_to`='$user_to_msg' AND `user_from`='$user_from_msg') OR (`user_from`='$user_to_msg' AND `user_to`='$user_from_msg')  ORDER by 1 ASC";
            $run_msg=mysqli_query($con,$sel_msg);
            while($row_msg=mysqli_fetch_array($run_msg)){
            $user_to=$row_msg['user_to'];
            $user_from=$row_msg['user_from'];
            $msg_body=$row_msg['msg_body'];
            $msg_date=$row_msg['date'];
            ?>
            <div id="loaded_msg">
            	<p><?php
            	 if($user_to==$user_to_msg AND $user_from==$user_from_msg){echo" <div class='message' id='blue' data-toggle='tooltip' title='$msg_date'>$msg_body</div><br><br><br>";}
                else if($user_from==$user_to_msg AND $user_to==$user_from_msg)
                {
                	echo"<div class='message' id='green' data-toggle='tooltip' title='$msg_date'>$msg_body</div><br><br>";
                } 
            	 ?></p>
            </div>
            <?php
        } 
			?>
		</div>
      <?php
     if(isset($_GET['u_id'])){
     $u_id=$_GET['u_id'];
     if($u_id=="new"){
     echo'
     <form>
     <center><h3>Select Someone to Start Conversation</h3></center>
     <textarea disabled class="form-control" placeholder="enter ur message"></textarea>
     <input type="text" name=""  class="btn btn-default" disabled value="send" placeholder="">	
     </form><br><br>
     ';
 }
 else{
 echo'
  <form action="" method="POST">
     <textarea  class="form-control" placeholder="Enter ur Message" name="msg_box" id="message_textarea"></textarea>
     <input type="submit" name="send_msg"  id="btn-msg" value="Send" placeholder="">	
     </form><br><br>
     ';
}
 }

      ?>

      <?php
      if(isset($_POST['send_msg'])){
      $msg=htmlentities($_POST['msg_box']);
      if($msg==""){
      echo" <h4 style='color: red;text-align:center; '>Message was unable to send ! :(</h4>";
  }else if(strlen($msg)>37){
      echo"<h4 style='color: red;text-align:center; '>message is too long!Use only 37 characters :(</h4>";
  }
  else{
  $insert="insert into `user_messages`(`user_to`,`user_from`,`msg_body`,`date`,`msg_seen`) values ('$user_to_msg','$user_from_msg','$msg',NOW(),'no')";
  $run_insert=mysqli_query($con,$insert);

}
  }

      ?>

	</div>
	<div class="col-sm-3">
		<?php
     if(isset($_GET['u_id'])){
     global $con;
     $get_id=$_GET['u_id'];
     $get_user="select * from `users` where `user_id`='$get_id'";

     $run_user=mysqli_query($con,$get_user);
     $row=mysqli_fetch_array($run_user);
     $user_id=$row['user_id'];
     $user_name=$row['user_name'];
     $f_name=$row['f_name'];
     $l_name=$row['l_name'];
     $describe_user=$row['describe_user'];
     $user_country=$row['user_country'];
     $user_image=$row['user_image'];
     $register_date=$row['user_reg_date'];
     $gender=$row['user_gender'];

    
 }

 if($get_id=="new")
 {

 }else{
 echo"
 <div class='row'>
 	<div class='col-sm-2'>
 	</div>
 	<center>
 		<div style='background-color: #e6e6e6;' class='col-sm-9'><h2>information about</h2>
        <img src='users/$user_image' width='150px' height='150px' class='img-circle'><br><br>
        <ul class='list-group'>
        	<li class='list-group-item' title='username'><strong>$f_name $l_name</strong></li>
        	<li class='list-group-item' title='user status'><strong style='color: grey;'>$describe_user</strong></li>
        	<li class='list-group-item' title='gender'>$gender</li>
        	<li class='list-group-item' title='user_country'>  $user_country</li>
     		<li class='list-group-item' title='user registration date'>$register_date</li>
        </ul>
 		</div>
 		<div class='col-sm-1'></div>
     </div>
     ";
    }
    ?>
	</div>
</div>
<script>
	var div = document.getElementById("scroll_messages");
	div.scrollTop=div.scrollHeight;
</script>
</body>
</html>