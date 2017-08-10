<?php
session_start();
if(!isset($_SESSION['login']) && $_SESSION['login']!='yes')
	{
	header("Location: index.php");
	}
?>
<?php
include_once('database.php');

if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
{
	$un = $_COOKIE['username'];
	$pwd = $_COOKIE['password'];
}
else 
{
	$un=$_POST['username'];
	
$pwd=$_POST['password'];
	
}


if(!$con){
	header('Location:index.php?db_connection=error');
	}
?>
<?php
$sql = "SELECT * FROM tbl_users WHERE un='$un' AND pwd='$pwd'";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if($num==0)
	{
	
	header("Location: index.php?login=failed");
	
	}
else
	{
	$row = mysql_fetch_array($result);
	$_SESSION['login'] = 'yes';
	$_SESSION['user_id'] = $row['user_id'];
	$_SESSION['username'] = $row['un'];
	$_SESSION['fname']=  $row['fname'];
	$date = date("Y-m-d H:i:s", strtotime('+4 hours 45 minutes'));
	
	$sql = "UPDATE tbl_users SET last_login= '$date' WHERE user_id = '$row[user_id]'";
	
	mysql_query($sql);
		$_SESSION['user_welcome']=$row['fname'];
		header('Location: home.php');
			
	}

?>
<?php
if(isset($_POST['chkbox']))
{
	setcookie('username',$un,time()+86400);
	setcookie('password',$pwd,time()+86400);
	
	}
	else echo "not checked";
?>
