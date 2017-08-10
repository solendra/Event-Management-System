<?php
session_start();
session_destroy();
header("location:index.php");
if(isset($_COOKIE['username']))
{
	setcookie('username',$un,time()-100);
}
if(isset($_COOKIE['password'])){
	setcookie('password',$pwd,time()-100);
}
	
?>