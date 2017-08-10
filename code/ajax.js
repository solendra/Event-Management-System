// JavaScript Document

function checkUsername()
	{
		un=document.getElementById('un').value;
		
		var ajaxRequest; 	
	try
		{
		ajaxRequest = new XMLHttpRequest();
	   	}
	catch (e)
		{
		try
			{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			}
		catch (e)
			{
			try
				{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				}
			catch (e)
				{
				alert("Your browser broke!");
				return false;
				}
			}
		}
	ajaxRequest.onreadystatechange = function()
		{
			
		
		if(ajaxRequest.readyState == 1 || ajaxRequest.readyState == 2 || ajaxRequest.readyState == 3)
			{			
			document.getElementById('usr_blank').src ='loading...';
			}
		
			
		if(ajaxRequest.readyState == 4)
			{			
				if(ajaxRequest.responseText == "Try with another username")
				{
						// if username not available
						document.getElementById('usr_blank').innerHTML = ajaxRequest.responseText;
						document.getElementById('usr_blank').style.color="red";
										}
				
				
				else
				{				// if username is available
						
						document.getElementById('usr_blank').innerHTML = ajaxRequest.responseText;
						document.getElementById('usr_blank').style.color="green";
				}
			
			}
		}
		
	
	ajaxRequest.open("GET", 'checkun.php?un='+un, true);
	ajaxRequest.send(null); 
	}
	
//checking email


function checkemail()
	{
		email= document.getElementById('email').value;
		
		var ajaxRequest; 	
	try
		{
		ajaxRequest = new XMLHttpRequest();
	   	}
	catch (e)
		{
		try
			{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			}
		catch (e)
			{
			try
				{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				}
			catch (e)
				{
				alert("Your browser broke!");
				return false;
				}
			}
		}
	ajaxRequest.onreadystatechange = function()
		{
			
		
		if(ajaxRequest.readyState == 1 || ajaxRequest.readyState == 2 || ajaxRequest.readyState == 3)
			{			
			document.getElementById('email_check').src ='loading...';
			}
		
			
		if(ajaxRequest.readyState == 4)
			{			
			document.getElementById('email_check').innerHTML = ajaxRequest.responseText;
			document.getElementById('email_check').style.color="green";
			}
		}
		
	
	ajaxRequest.open("GET", 'checkemail.php?email='+email, true);
	ajaxRequest.send(null); 
	}
	