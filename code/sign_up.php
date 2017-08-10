<section id="sign_up" style="display:none">
           	<h2 style="text-align:center;font-size:30px;color:#363636;">Sign Up Here</h2>
           <form class="new_register" name="form1" id="new_register" action="sign_up_action.php" method="post" onsubmit="Javascript: return validateForm(this)";>
            
            
            <input type="text" id="fname" name="fname" placeholder="First Name" required="required" autofocus="autofocus"/>
             <input type="text" id="lname" name="lname" placeholder="Last Name" required="required"/>
             <input type="text" id="un" name="un"   placeholder="User Name" onkeyup="Javascript: checkUsername();"
              required="required"/> <p id="usr_blank" style="clear:all;font-size:15px;float:right;margin-right:60px;margin-top:2px;"></p><br />        
             
              <input type="text" id="email" name="email"   placeholder="Your Email Address" required="required" 
               onkeyup="Javascript: checkemail();"/>
              <p id="email_check" style="clear:all;font-size:15px;float:right;margin-right:60px;margin-top:2px;"></p> <br />
             <input type="password" id="npwd" name="pwd" placeholder="Password" required="required"/> <br />
             <input type="password" id="rpwd" name="rpwd" placeholder="Re-type Password" required="required"/><br />         
           
             <input type="radio" id="gen" name="gender" value="male" />Male
          <input type="radio" id="gen" name="gender" value="female"/>Female <br />
          <input type="checkbox" id="chkbox1" name="chkbox1" />I agree the<a id="tc" href="javascript:;">Terms and Conditions</p>
            </a><br />
          <input type="submit" id="sign_up_btn" name="btnsubmit" value="Sign Up" />
          <input type="button" id="cancel" value="Cancel"/>
          
                       </form>
            </section>