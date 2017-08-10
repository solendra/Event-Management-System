<?php 
include("database.php");
$attend = $_GET['attend'];
$user_id = $_GET['user_id'];
$event_id = $_GET['event_id'];
if($attend == 1)
	{$attend ='Going';}
if($attend == 2)
	{$attend ='NotGoing';}
if($attend == 3)
	{$attend ='Thinking';}
	
	
	
if(empty ($user_id ) || empty($event_id))
	{
		
	header("Location: home.php?err=postingaction");
	}
	else
	{
$sql="SELECT * FROM `tbl_participations` WHERE event_id='$event_id' and user_id='$user_id' ";
$result=mysql_query($sql);
$num = mysql_num_rows($result);
	
	if($num<1)
	{
		$sql1="INSERT INTO `tbl_participations` (`participation_id`,`user_id`,`event_id`,`type`) VALUES (NULL, '$user_id', 		           		'$event_id','$attend')";
		mysql_query($sql1);
			} 
	else {
		$sql2="UPDATE `tbl_participations` SET `type`='$attend' WHERE event_id='$event_id' AND user_id='$user_id'";
		mysql_query($sql2);

	}

header("location:myevents.php");
	}
	
?>