<?php
session_start();
include('database.php');
if(!isset($_SESSION['login']) && $_SESSION['login']!='yes')
	{
	header("Location: index.php");
	}
$user_id = $_SESSION['user_id'];	
$event_id = mysql_real_escape_string($_GET['event_id']);
$sql = "SELECT * FROM tbl_events WHERE event_id = '$event_id' AND user_id = '$user_id'";


$result = mysql_query($sql);
$num = mysql_num_rows($result);
if($num==0)
	{
	header("Location: home.php");
	exit;
	}
$row = mysql_fetch_array($result);

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

</section> <!--end of home_banner-->
<div class="edit_event">
		<div id="header_event"> <h3>Edit Event</h3>
		</div>     <!--end of header_event-->
<form name="form4" id="form4" action="event_edit_action.php" method="post">
	<input type="hidden" name="event_id" value="<?php echo $row['event_id']?>" />
	Title:
    <input id="title" type="text" name="title" value="<?php echo $row['title'];?>" /><br />
    Details:<br />
   	<textarea id="details" name="details" rows="5" cols="200"><?php echo $row['details'];?> </textarea> <br />
    Venue:<input type="text" name="venue" id="venue" placeholder="Add place" value="<?php echo $row['venue'];?>"/> <br />
    <script type="text/javascript">
 
	 	$(document).ready(function() {
		$(document).click(function(event){
		$('#event_date').datepicker({
		dateFormat: 'yy-mm-dd'
		
		});	

  });
  });
</script>
    When:<input type="text" id="event_date" name="event_date" onclick="Javascript:;"/>
    Time: 
    <select name="hour" style="width:50px;">
    	<?php for($i = 1; $i <= 12; $i++)
		
		{ ?>
    	<option value="<?php if($i<10)
										echo "0".$i;
										else
										echo $i; ?>" >
										<?php if($i<10)
										echo "0".$i;
										else
										echo $i; ?></option>
        
        <?php } ?>
    </select>
    
    <select name="minute" style="width:50px;">
    	<?php for($i = 0; $i <= 59; $i++)
		{ ?>
    	<option value="<?php if($i<10)
										echo "0".$i;
										else
										echo $i; ?>">
									<?php if($i<10)
										echo "0".$i;
										else
										echo $i; ?></option>
                        
        
        <?php } ?>
      
    </select>
    <select name="am_pm" style="width:50px;">
    <option value="AM">AM</option>
    <option value="PM">PM</option>
    </select>
 	<br />
<input  type="submit" name="btn_add" id="btn_add" value="Ok">
<a href="home.php"> <input type="button" id="btn_cancel" value="Cancel"></a>

</form>

  
</div> <!--end of add_event  -->

</div><!--end of home_main-->
	
    
   <?php
       include_once('includes/footer.php');
 ?>
  </body>
</html>