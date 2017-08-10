<?php
session_start();
if(!isset($_SESSION['login']) && $_SESSION['login']!='yes')
	{
	header("Location: index.php");
	}
?>
<?php
include_once('database.php');
$user_id=$_SESSION['user_id'];
$title=$_POST['title'];
$details=$_POST['details'];
$venue=$_POST['venue'];
$event_date=$_POST['event_date'];
$post_date=date("Y-m-d H:i:s",strtotime('+4 hours 45 minutes') );

$hour = $_POST['hour'];
$minute = $_POST['minute'];
$am_pm=$_POST['am_pm'];
$event_date = $event_date;
$event_time="$hour".":$minute".":00"." "."$am_pm";


if(!$con)								//checks the connection to the db
{
	die('Connection Error:') .mysql_error();
	}
?>
<?php
if(!isset ($_POST['btn_add']))
{
	header("Location:home.php?event.insert=error");
}
else{

$sql="INSERT INTO `tbl_events`(`event_id`, `user_id`, `title`, `details`, `venue`, `event_date`,`event_time`, `post_date`) VALUES (NULL,'$user_id','$title','$details','$venue','$event_date','$event_time','$post_date')";
 
 
	if( mysql_query($sql)){
		
	header("location:home.php?event.insert=success");
	$_SESSION['event_id']=$row['event_id'];
	}
	else{
	header("location: home.php?event.insert=error");
	mysql_close($con);
	}
  }


?>