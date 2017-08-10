<?php
include_once('database.php');
?>
<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$un=$_POST['un'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$gender=$_POST['gender'];
$date = date("Y-m-d H:i:s", strtotime('+4 hours 45 minutes'));


if(!$con)								//checks the connection to the db
{
	die('Connection Error:') .mysql_error();
	}
if(isset($_POST['btnsubmit'])) 
{
	
$sql="INSERT INTO `tbl_users` 
	(`user_id`,`fname`,`lname`,`un`,`email`,`pwd`,`gender`,`status`,`last_login`,`reg_date`)VALUES
	(NULL,'$fname','$lname','$un','$email','$pwd','$gender','active','','$date')";
}
 if(mysql_query($sql)){
 header("location:index.php?sign_up=success");
  mysql_close($con);
 }
else 
header('location: index.php?sign_up=error');
  ?>
  
  
  