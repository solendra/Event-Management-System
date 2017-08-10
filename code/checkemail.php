<?php
include('database.php');
$email= $_GET['email'];
$sql = "SELECT * FROM tbl_users WHERE email= '$email'";

$result = mysql_query($sql);

if(!empty($email))
{
	$num = mysql_num_rows($result);
	if($num>0)
	{
	echo 'Try with another email';
}
else	
{
		echo 'Availabe for use';
	}
}
?>
