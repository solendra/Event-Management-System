<div class="add_event">
		<div id="header_event"> <h3>Create New Event</h3>
		</div>     <!--end of header_event-->
<form name="form3" id="form3" action="event_add_action.php" method="post">
	Title:
    <input id="title" type="text" name="title" required="required" /><br />
    Details:<br />
   	<textarea id="details" name="details" rows="5" cols="200"> </textarea> <br />
    Venue:<input type="text" name="venue" id="venue" placeholder="Add place" required="required" /> <br />
    When:<input type="text" id="event_date" name="event_date" />
    Time: 
    <select name="hour" style="width:50px;">
    	<?php for($i = 1; $i <= 12; $i++)
		
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
<input  type="submit" name="btn_add" id="btn_add" value="+ Create">
<input type="button" id="btn_cancel" value="Cancel">

</form>
  
</div> <!--end of add_event  -->

