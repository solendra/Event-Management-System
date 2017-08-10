<?php
if(!file_exists('config.php'))
{
	header("location:setup.php");
	
}

if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
{
	header("Location: log_in_action.php");	
}

session_start();
if(isset($_SESSION['login']) && $_SESSION['login']== 'yes')
{
	header("Location: home.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DynamicWebsite</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<script src="jsfunction.js" type="text/javascript"> </script>
<script src="jquery/jquery.js" type="text/javascript" ></script>
<script src="ajax.js" type="text/javascript"></script>

</head>



<body>  
	
		<noscript>Javascript is disabled in your browser. Turn on the javascript to see maximum javascript effects</noscript>
	<div class="wrapper">
	<?php 
		include_once('includes/header.php');
		?>
    <div class="main">
    	<div class="main_left">
       <?php include_once('sign_up.php')?>
        </div>
      				 <!--end of main_left -->
        <div class="main_right">
        	<section id="log_in"><p>Sign In</p>
            	<form name="form2" action="log_in_action.php" method="POST"   onsubmit="Javascript: return checkunpwd()">
                		
                                    <p style="font-size:12px;color:#F00; text-decoration:none; font-family:Arial, Helvetica, 				                                        sans-serif; text-align:center;">
										<?php 
										if(isset($_GET['login']) && $_GET['login']=='failed')
										{
											echo "Bad Username or Password";
										} ?>
                                     </p>
                 Username:<input type="text" name="username" id="username"  value="<?php
                 			if(isset($_COOKIE['username']))
							{
								echo $_COOKIE['username'];}
								else{
								echo NULL;}?>" autofocus="autofocus"/><br />
                 <p id="un_blank"></p>
               	 Password: <input type="password" name="password" id="pwd" 
                 			value="<?php
                            if(isset($_COOKIE['password']))
							{
								echo $_COOKIE['password'];
								}
								else{
									echo NULL;}
								?>" />  <br />
                 <p id="password"></p>
                 <input type="checkbox" name="chkbox" id="chkbox" />Keep me logged in<br />
                 <a href="#">Forgot Your Password?</a> <br />
                 
                 
                 <input id="submitbtn"type="submit" value="Log in"  />
                 
                </form> 
               </section>
          
         
          <input type="button" id="sign_up_click" value="Create New Account" onclick="Javascript:;" />
                <script type="text/javascript">
				$(document).ready(function() {
					$('#sign_up_click').click(function(event){
						event.preventDefault();
						$('#sign_up').slideToggle(['fast'],['swing']);
						
						});
				});
					</script>
                    <script type="text/javascript">
					$('a#tc').click(function(event){
						event.preventDefault();		//prevent the default action
						$('#log_in').slideUp('fast');
						$('#sign_up_click').slideUp('fast');			
						});
						</script>
                        <script type="text/javascript">
					$('#cancel').click(function(event){
						event.preventDefault();
						$('#log_in').slideDown('fast');
						$('#sign_up').hide('100');
						$('#sign_up_click').show('100');
						$('#term_cond').hide('fast');
												});
					
               
                </script>
                
           
        </div>				<!--end of main_right -->
    </div>					<!--end of main -->
    <?php
    include_once('includes/footer.php');
	?>
    </div> <!--end of wrapper-->
</body>
</html>