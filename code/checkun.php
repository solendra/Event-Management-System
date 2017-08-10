<?php
include('database.php');
$un = $_GET['un'];
$sql = "SELECT * FROM tbl_users WHERE un= '$un'";

$result = mysql_query($sql);

if(!empty($un))
{
	$num = mysql_num_rows($result);
	if($num>0)
	{
	echo 'Try with another username';
	}
	else	
	{
		echo 'Availabe for use';
	}
}
?>

