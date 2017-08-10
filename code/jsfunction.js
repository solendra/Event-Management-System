// JavaScript Document

/*
hide show function
*/



function checkunpwd(){
	un=document.forms['form2']['username'].value;
	pwd=document.forms['form2']['password'].value;
	
	if(un==null || un==""){
		//alert("please enter username");
		document.getElementById('un_blank').innerHTML="Please Enter Username";
		document.getElementById('un_blank').style.color="#F00";
		document.getElementById('un_blank').style.fontSize="12px";
		document.getElementById('un_blank').style.textAlign="center";
		document.getElementById('un_blank').style.textDecoration="none";
		document.getElementById('un_blank').style.fontWeight="100";
		document.form2.username.focus();
		return false
		}
	if(pwd==null || pwd==""){
		//alert("please enter password");
		document.getElementById('password').innerHTML="Please Enter Password";
		document.getElementById('password').style.color="#F00";
		document.getElementById('password').style.fontSize="12px";
		document.getElementById('password').style.textAlign="center";
		document.getElementById('password').style.textDecoration="none";
		document.getElementById('password').style.fontWeight="100";

		document.form2.password.focus();
		return false
		}
	}


//form validation using JS
function validateForm(form)
{
	
	var x=document.forms['new_register']['fname'].value;
	var y=document.forms['new_register']['lname'].value;
	var a=document.forms['new_register']['un'].value;
	var b=document.forms['new_register']['email'].value;
	var c=document.forms['new_register']['pwd'].value;
	var d=document.forms['new_register']['rpwd'].value;
	
	var atpos=b.indexOf("@");
	var dotpos=b.lastIndexOf(".");
	
	if(x==null || x=="")
	{
		alert('First name missing');
		document.form1.fname.focus();
		return false;
	}
	else if(y==null || y=="")
	{
		alert('last name missing');
		document.form1.lname.focus();
		return false;
			}
	else if(a==null || a=="")
	{
		//alert('username missing');
		document.getElementById('usr_blank').innerHTML="first name missing";
		document.getElementById('usr_blank').style.color="Red";
		document.getElementById('usr_blank').style.fontSize="12px";
		document.getElementById('usr_blank').style.clear="both";
		document.getElementById('usr_blank').style.cssFloat="right";
		
		document.form1.un.focus();
		return false;
			}
	else if(b==null || b=="")
	{
		alert('Email missing');
		document.form1.email.focus();
		return false;
					}
	
	
	else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length)
  {
  alert("Not a valid e-mail address");
  document.form1.email.focus();
  return false;
  }
  
	else if(c==null || c==""){
		alert('Please Enter Password');
		document.form1.pwd.focus();
		return false;
		}
	else if(c!==d)
	{
		alert('Password mismatch');
		document.form1.pwd.focus();
		return false;}
	
	else if (( form.gender[0].checked == false ) && (form.gender[1].checked == false )) 
{
	alert('Select gender');
	return false;
	}
	else if(form.chkbox1.checked==false)
	{
		alert('agree the terms and conditions');
		return false;
		}
	
}

