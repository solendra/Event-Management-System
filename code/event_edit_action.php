<?php
session_start();
include('database.php');
if(!isset($_SESSION['login']) && $_SESSION['login']!='yes')
	{
	header("Location: index.php");
	}

?>
<?php
$user_id=$_SESSION['user_id'];
$event_id=$_POST['event_id'];
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

$sql = "SELECT * FROM tbl_events WHERE user_id = '$user_id' AND event_id = '$event_id'";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if(isset($_POST['btn_add']))
{
if($num==0)
	{
	header("Location: home.php");

	}
else
	$sql = "UPDATE `tbl_events` SET `title` = '$title',
`details` = '$details',
`venue` = '$venue',
`event_date` = '$event_date',
`event_time`='$event_time',
`post_date`='$post_date'
 WHERE `event_id`= '$event_id'";
if(!mysql_query($sql))
die('updating error').mysql_error();
else
header("Location: home.php?event_update=success	");
}
else header('Location: home.php?event_update=error');
?>