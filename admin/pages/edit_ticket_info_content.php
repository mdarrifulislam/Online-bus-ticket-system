<?php
$ticket_id=$_GET['id'];
$query_result=$obj_super_admin->select_ticket_info_by_id($ticket_id);
$ticket_info=mysqli_fetch_assoc($query_result);

if(isset($_POST['btn_save'])){
    $obj_super_admin->update_ticket_info_by_id($_POST);
    
}
?>



<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Ticket Information</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <h2 style="color: #009900"><?php if (isset($message)) {echo $message; }?></h2>
        <div class="box-content">
            <form class="form-horizontal" name="edit_ticket" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Bus Name</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" value="<?php echo $ticket_info['bus_name'];?>" name="bus_name" id="typeahead"  data-provide="typeahead" data-items="4"  data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                            <input type="hidden" class="span6 typeahead" value="<?php echo $ticket_info['ticket_id'];?>" name="ticket_id" id="typeahead"  data-provide="typeahead" data-items="4"  data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>

                            <p class="help-block">Start typing to add ticket info!</p>
                        </div>
                    </div>



                    <div class="control-group">
                        <label class="control-label" for="typeahead">Available Seats</label>
                        <div class="controls">
                            <input type="number" class="span6 typeahead" value="<?php echo $ticket_info['available_seats'];?>"  name="available_seats" id="typeahead"  data-provide="typeahead" data-items="4"  data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Start Time</label>
                        <div class="controls">
                            <input type="time" class="span6 typeahead" value="<?php echo $ticket_info['start_time'];?>" name="start_time" id="typeahead"  data-provide="typeahead" data-items="4"  data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Journey Date</label>
                        <div class="controls">
                            <input type="date" class="span6 typeahead"  value="<?php echo $ticket_info['journey_date'];?>" name="journey_date" id="typeahead"  data-provide="typeahead" data-items="4"  data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                        </div>
                    </div>
                    
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Ticket Info Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="ticket_info_description" id="textarea2" rows="3">
                                <?php echo $ticket_info['ticket_info_description'];?>
                            </textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">From</label>
                        <div class="controls">

                            <select name="from_place">
                                <option value="0">Dhaka</option>
                                <option value="1">Rangpur</option>
                                <option value="2">Mymensingh</option>
                                <option value="3">Bogra</option>
                                <option value="4">Chittagong</option>
                            </select>
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">To</label>
                        <div class="controls">

                        <select name="to_place">
                                <option value="0">Dhaka</option>
                                <option value="1">Rangpur</option>
                                <option value="2">Mymensingh</option>
                                <option value="3">Bogra</option>
                                <option value="4">Chittagong</option>
                            </select>

                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                                <option>--------Publication Status--------</option>
                                <option value="0">Unpublish</option>
                                <option value="1">Publish</option>

                            </select>
                        </div>
                    </div>
        
                    <div class="form-actions">
                        <button type="submit" name="btn_save" class="btn btn-primary">Update Ticket Info</button>
<!--                        <button type="reset" name="btn_reset" class="btn">Reset</button>-->
                    </div>
                </fieldset>
            </form>   
        </div>
        </div>
    <!--/span-->

</div>

<script>
    document.forms['edit_ticket'].elements['publication_status'].value='<?php echo $ticket_info['publication_status'];?>'
    document.forms['edit_ticket'].elements['from_place'].value='<?php echo $ticket_info['from_place'];?>'
    document.forms['edit_ticket'].elements['to_place'].value='<?php echo $ticket_info['to_place'];?>'
</script>

