<?php
$host="localhost";
$db_un="root";
$db_pwd="";
$con=mysql_connect($host,$db_un,$db_pwd);
$db="solendrapanjiyar";
if(!$con)									//connection checking
{
	die("couldnot connect to mysql").mysql_error();
	
}
else
{
	$db_select= mysql_select_db($db);	
	
	if(!$db_select)
	{
		$db_sql="CREATE DATABASE $db";			//creating database
		mysql_query($db_sql);
		mysql_select_db($db);
		$tbl_1="CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `un` varchar(25) NOT NULL,
  `email` varchar(80) NOT NULL,
  `pwd` varchar(25) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `status` enum('new','active','block') NOT NULL,
  `last_login` datetime NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;
";
mysql_query($tbl_1);				//creatation of tbl_users

$data_insert_tb1_1="INSERT INTO `tbl_users` (`user_id`, `fname`, `lname`, `un`, `email`, `pwd`, `gender`, `status`, `last_login`, `reg_date`) VALUES
(15, 'solendra', 'panjiyar', 'solen', 'psolendra@gmail.com', 'admin123', 'male', 'active', '2014-01-29 12:00:11', '2014-01-07 08:55:59'),
(65, 'admin', 'admin', 'admin', 'admin@mail.com', 'admin', 'male', 'active', '2014-01-28 12:38:59', '2014-01-17 06:56:45'),
(129, 'Jitendra', 'Maharjan', 'jiten', 'jiten@softwarica.edu.np', 'admin', 'male', 'active', '2014-01-29 11:43:53', '2014-01-29 03:24:15'),
(130, 'niman', 'maharjan', 'niman', 'niman@softwarica.edu.np', 'admin', 'male', 'active', '2014-01-29 11:51:06', '2014-01-29 08:25:27')";

mysql_query($data_insert_tb1_1);				//inserting data into tbl_users

$tb_2="CREATE TABLE IF NOT EXISTS `tbl_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `details` text NOT NULL,
  `venue` varchar(150) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` varchar(80) NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`event_id`)
)";
	mysql_query($tb_2);								//creating tbl_events
	
	$data_insert_tb1_2="INSERT INTO `tbl_events` (`event_id`, `user_id`, `title`, `details`, `venue`, `event_date`, `event_time`, `post_date`) VALUES
(20, 65, 'Saraswati Puja', 'Softarica College is organising this puja ', 'Diliibazar', '2014-03-27', '01:00:00 AM', '2014-01-31 12:52:15'),
(34, 129, 'Sanitaion ', ' Bagmati river sanitaion program organised by the Kathmandu Youth Club.Every interested person are welcome to join the programm', 'Gaushala', '2014-02-28', '08:00:00 AM', '2014-01-29 11:48:10'),
(35, 129, 'Loktantra', 'Celebration of loktandra achievement and speech by the PM and other political leaders ', 'Tudikhel', '2014-03-27', '10:00:00 PM', '2014-01-29 11:50:57'),
(37, 15, 'Jatra', ' Indra Jatra is going to be organised by the SS Youth Club', 'Hanumandhoka', '2014-03-20', '04:00:00 PM', '2014-01-29 12:01:26'),
(38, 15, 'Education Mela', ' All the reputed Indian university and institute are coming to this mela.', 'Bhirkutimandap', '2014-02-22', '09:00:00 AM', '2014-01-29 12:09:24'),
(39, 130, 'Fresher Party', ' Softwarica College is going to organize fresher party for Batch 10', 'Annapurna Hotel', '2014-03-31', '01:00:00 PM', '2014-01-31 12:54:22'),
(40, 130, 'Blood Donation', ' Youth Club of Softwarica is organizing blood donation Program', 'Dillibazar,Kathmandu', '2014-03-22', '09:00:00 AM', '2014-01-31 12:56:12');

";
mysql_query($data_insert_tb1_2);				//inserting data into tbl_events

$tb_3="CREATE TABLE IF NOT EXISTS `tbl_participations` (
  `participation_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('Going','NotGoing','Thinking') NOT NULL,
  PRIMARY KEY (`participation_id`)
) ";
mysql_query($tb_3);				//creating tbl_participations

$data_insert_tb1_3="INSERT INTO `tbl_participations` (`participation_id`, `event_id`, `user_id`, `type`) VALUES
(20, 15, 65, 'Going'),
(21, 20, 65, 'NotGoing'),
(22, 21, 15, 'Going'),
(26, 20, 15, 'Going'),
(27, 22, 15, 'Thinking'),
(28, 24, 15, 'Thinking'),
(29, 15, 15, 'NotGoing'),
(31, 28, 65, 'NotGoing'),
(34, 32, 15, 'Going'),
(35, 31, 15, 'NotGoing'),
(36, 32, 65, 'Going'),
(37, 34, 15, 'Thinking'),
(38, 35, 15, 'NotGoing'),
(39, 38, 15, 'NotGoing'),
(40, 37, 15, 'Thinking');

";	

mysql_query($data_insert_tb1_3);			//inserting data into tbl_participations

$fn = 'config.php';								//creating a file named config.php
	$fo = fopen($fn, 'w');
	fwrite($fo,$db_select);
	fclose($fo);
	header('location:index.php');
	
	
		}
	
}
?>