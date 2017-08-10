<?php
include('database.php');
$user_id=$_GET['user_id'];
$event_id=$_GET['event_id'];

if(!$con){
	header('Location:index.php?db_connection=error');
	die('connection error').mysql_error();
	}
	elseif(empty ($user_id ) || empty($event_id))
	{
		
	header("Location: home.php?err=deleting");
	}
	else
		{
		$sql="DELETE FROM `tbl_events` WHERE user_id='$user_id' AND event_id='$event_id'" ;
		$sql1="DELETE FROM `tbl_participations` WHERE event_id='$event_id'";
		mysql_query($sql);
		mysql_query($sql1);
		header("Location: home.php?delete=success");
	}
	
?>