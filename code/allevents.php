<?php
session_start();
include('database.php');
if(!isset($_SESSION['login']) && $_SESSION['login']!='yes')
	{
	header("Location: index.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DynamicWebsite</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<link href="css/style2.css" rel="stylesheet" type="text/css" />
<link href="css/style3.css" rel="stylesheet" type="text/css" />
<script src="jquery/jquery.js" type="text/javascript" ></script>
<link href="jquery/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css" type="text/css" rel="stylesheet"/>
<link href="jquery/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.min.css" type="text/css" rel="stylesheet"/>
<script src="jquery/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
<script src="jquery/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
<script src="jquery/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
  </head>

<body>
<?php 
include_once('includes/header.php');
?>
<div class="home_main">
	<section id="home_banner">
<ul>
	<li><a href="home.php" style="color:#2F4F4F">Home</a>
		    </li>
<li><a href="myevents.php"   style="color:#2F4F4F">MyEvents</a></li>
<li>
	<a id="crt_event" href="javascript:;" style="color:#2F4F4F">Create Events</a>
</li>
 
 
<li><a href="allevents.php" style="color:#2F4F4F">All Events</a></li>
<li id="wel_come" >Welcome  <?php echo $_SESSION['user_welcome'] ?>
	<p > <a  id="logOut" href="log_out_action.php">log out</a></p>
	</li>

</ul>




        <script type="text/javascript">
		$(document).ready(function() {
		$('a#crt_event').click(function(event){

		$('.add_event').slideToggle('fast');
			
			});
		$('#btn_cancel').click(function(event){
			$('.add_event').slideUp('slow');
			});
		 $(document).click(function(event){
		$('#event_date').datepicker({
		dateFormat: 'yy-mm-dd'
		
		});	
		
	});

		});
        </script> 
</section>				<!--end of home_banner-->
<section class="add_event1">
<?php 
	include_once('event_add.php');?>
</section>

 
             <?php
			 $date = date("Y-m-d");
			 $sql = "SELECT * FROM tbl_events WHERE event_date>'$date' ORDER BY `event_date` ";
			 $result = mysql_query($sql);
			$num = mysql_num_rows($result);
			 
			 
			 for($i=0; $i<$num; $i++)
			 	{
				$row = mysql_fetch_array($result);
				$user = mysql_fetch_array(mysql_query("SELECT * FROM tbl_users WHERE user_id = '$row[user_id]'"));
				
			 ?>


			<?php $date1=$row['event_date'];
				   $date1=date("j M Y",strtotime("$date1"))
			?>
				
<div class="event_date_show"><?php echo $date1;?><p style="clear:all; text-align:right;float:right;margin-right:10px;">		         
		Posted By <?php	echo $user['fname'];
		?></p>
		</div><!--end of event_date_show-->
			<div class="event_show">
			<h3><?php echo $row['title'];?></h3>
			<p><?php echo $row['details']?></p>
			<p style="font-weight:bolder">Venue: <?php echo $row['venue']?></p>
			<p><?php echo $row['event_time']."&nbsp;"."sharp"?> </p>
            
             <?php
			 if($_SESSION['user_id']==$row['user_id'])
			 	{
				 ?>   
            <a href="event_edit.php?user_id=<?php echo $row['user_id']?>&event_id=<?php echo $row['event_id']?>" id="edit">Edit</a>
       
           <a href="event_delete.php?user_id=<?php echo $row['user_id']?>&event_id=<?php echo $row['event_id']?>" id="delete" onclick="Javascript: return  confirmMsg()">Delete</a> 
            <?php
				}
			?>
           <script type="text/javascript">
		   		function confirmMsg(){
					var x=confirm("Are You Sure To Delete This Event?");
					if(x==true)
						return true;
						else
						return false;
									
					}
		   </script> 
          
            <br />
           

           
           
<?php 
$sql1=mysql_query("SELECT * FROM tbl_participations WHERE event_id='$row[event_id]' AND  user_id='$_SESSION[user_id]' ");
$num1 = mysql_num_rows($sql1);
if($num1>0)
{
$result1 = mysql_fetch_array($sql1);

 ?>
 	<p>You are <?php echo $result1['type'];?></p>
 <?php }?>

 
 
            <!--coding of going,notgoing and thinking action of users on events-->
	    <a id="lnk_going" href="participation.php?attend=1&user_id=<?php echo $_SESSION['user_id']; ?>&event_id=<?php echo $row['event_id'];		          ?>">
                    Going</a>
          
	  <a id="lnk_notgoing" href="participation.php?attend=2&user_id=<?php echo $_SESSION['user_id'];?>&event_id=<?php echo $row['event_id'];?>">
       Not Going</a>
	     
      <a id="lnk_thinking" href="participation.php?attend=3&user_id=<?php echo $_SESSION['user_id']; ?>&event_id=<?php echo $row['event_id'];?>">
          
          Thinking</a>
          <div id="event_action">		<!--start of event_action-->
          
          
  <?php $going = mysql_query("SELECT * FROM tbl_participations WHERE event_id='$row[event_id]' AND `type`='Going'"); 
 		$num_going = mysql_num_rows($going);
 
 $not_going = mysql_query("SELECT * FROM tbl_participations WHERE event_id='$row[event_id]' AND `type`='NotGoing'"); 
 $num_not_going = mysql_num_rows($not_going);
 
 $thinking = mysql_query("SELECT * FROM tbl_participations WHERE event_id='$row[event_id]' AND `type`='Thinking'"); 
 $num_thinking = mysql_num_rows($thinking);
 ?>
 
 
 
	
    
     <?php
 for($a=0; $a<$num_going; $a++)
 {
 $going_fetch = mysql_fetch_array($going);
 $going_id = $going_fetch['user_id'];
 $going_person = mysql_fetch_array(mysql_query("SELECT * FROM tbl_users WHERE user_id='$going_id'"));
 
   //echo $going_person['firstname']."<br>";
 
 }
  ?>
 
 
          		<table>
                <tr>
                	<td>Going: <?php echo $num_going;?></td>
                      <td>Not Going: <?php echo $num_not_going; ?></td>
                    <td>Thinking:  <?php echo $num_thinking; ?></td>
                
                </tr>
                
                
                
                                </table>
           
          </div> <!--end of event_action-->
          
		</div> <!--end of event_show-->

 
<?php }?>

</div><!--end of home_main-->
	
    
   <?php
       include_once('includes/footer.php');
 ?>
  </body>
</html>