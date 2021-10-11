<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
      <title>Events</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
      
      <style>
         body {
            color: #fff;
            background: #63738a;
            font-family: 'Roboto', sans-serif;
         }
         .form-control {
            height: 40px;
            box-shadow: none;
            color: #969fa4;
         }
         .form-control:focus {
            border-color: #5cb85c;
         }
         .form-control, .btn {        
            border-radius: 3px;
         }
         .signup-form {
            width: 450px;
            margin: 0 auto;
            padding: 30px 0;
            font-size: 15px;
         }
         .signup-form h2 {
            color: #fff;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
         }
         .signup-form h2:before, .signup-form h2:after {
            content: "";
            height: 2px;
            width: 30%;
            background: #d4d4d4;
            position: absolute;
            top: 50%;
            z-index: 2;
         }	
         .signup-form h2:before {
            left: 0;
         }
         .signup-form h2:after {
            right: 0;
         }
         .signup-form .hint-text {
            color: #fff;
            margin-bottom: 30px;
            text-align: center;
         }
         .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #f2f3f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
         }
         .signup-form .form-group {
            margin-bottom: 20px;
         }
         .signup-form input[type="checkbox"] {
            margin-top: 3px;
         }
         .signup-form .btn {        
            font-size: 16px;
            font-weight: bold;		
            min-width: 140px;
            outline: none !important;
         }
         .signup-form .row div:first-child {
            padding-right: 10px;
         }
         .signup-form .row div:last-child {
            padding-left: 10px;
         }    	
         .signup-form a {
            color: #fff;
            text-decoration: underline;
         }
         .signup-form a:hover {
            text-decoration: none;
         }
         .signup-form form a {
            color: #5cb85c;
            text-decoration: none;
         }	
         .signup-form form a:hover {
            text-decoration: underline;
         }  
      </style>
   </head>
   <body>
      <div class="signup-form">
         <h2>Edit Events</h2>
         <?php echo form_open('event/update',['name'=>'events','autocomplete'=>'off']);?>
         <div class="form-group">
            <?php if($this->session->flashdata('success')){?>
               <p style="color:green"><?php  echo $this->session->flashdata('success');?></p>
            <?php } ?>
            <?php if($this->session->flashdata('error')){?>
               <p style="color:red"><?php  echo $this->session->flashdata('error');?></p>
            <?php } ?>
         </div>

         <div class="form-group">
            <input class="form-control" type="text" name="title" id="title" value="<?= isset($eventInfo) ? $eventInfo['title'] : set_value('title'); ?>" placeholder="Enter event title" />
            <div style='color:red'><?php echo form_error('title');?></div>
         </div>
         <div class="form-group">
            <input class="form-control" type="text" name="start_date" id="start_date" value="<?= isset($eventInfo) ? date("d-M-Y",strtotime($eventInfo['start_date'])) : set_value('start_date'); ?>" placeholder="Enter event start date" />
            <div style='color:red'><?php echo form_error('start_date');?></div>
         </div>
         <div class="form-group">
            <input class="form-control" type="text" name="end_date" id="end_date" value="<?= isset($eventInfo) ? date("d-M-Y",strtotime($eventInfo['end_date'])) : set_value('end_date'); ?>" placeholder="Enter event end date" />
            <div style='color:red'><?php echo form_error('end_date');?></div>
         </div>
         <div class="form-group">
            <label for="recurrence_type">Recurrence:</label><br>
            <input type="radio" name="recurrence_type" value="1" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 1 ? set_radio('recurrence_type', '1', TRUE) :  set_radio('recurrence_type', '1', FALSE); ?> /> Repeat <br>

            <select class="form-control" name="repeat_1" id="repeat_1">
                <option value="">Select</option>
                <option value="1" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 1 &&   $eventInfo['repeat_1'] == 1 ? "selected" : ""; ?>>Every</option>
                <option value="2" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 1 &&  $eventInfo['repeat_1'] == 2 ? "selected" : ""; ?>>Every Other</option>
                <option value="3" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 1 &&  $eventInfo['repeat_1'] == 3 ? "selected" : ""; ?>>Every Third</option>
                <option value="4" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 1 &&  $eventInfo['repeat_1'] == 4 ? "selected" : ""; ?>>Every Fourth</option>
            </select>
            <div style='color:red'><?php echo form_error('repeat_1');?></div>
                <br>
            <select class="form-control" name="repeat_2" id="repeat_2">
                <option value="">Select</option>
                <option value="1" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 1 &&  $eventInfo['repeat_2'] == 1 ? "selected" : ""; ?>>Day</option>
                <option value="2" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 1 &&  $eventInfo['repeat_2'] == 2 ? "selected" : ""; ?>>Week</option>
                <option value="3" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 1 &&  $eventInfo['repeat_2'] == 3 ? "selected" : ""; ?>>Month</option>
                <option value="4" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 1 &&  $eventInfo['repeat_2'] == 4 ? "selected" : ""; ?>>Year</option>
            </select>
            <div style='color:red'><?php echo form_error('repeat_2');?></div>
            <br>
            <input type="radio" name="recurrence_type" value="2" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 ? set_radio('recurrence_type', '2', TRUE) :  set_radio('recurrence_type', '1', FALSE); ?> /> Repeat On
            <br>
            <select class="form-control" name="repeat_on_1" id="repeat_on_1">
                <option value="">Select</option>
                <option value="1" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_1'] == 1 ? "selected" : ""; ?> >First</option>
                <option value="2" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_1'] == 2 ? "selected" : ""; ?> >Second</option>
                <option value="3" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_1'] == 3 ? "selected" : ""; ?> >Third</option>
                <option value="4" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_1'] == 4 ? "selected" : ""; ?> >Fourth</option>
            </select>
            <div style='color:red'><?php echo form_error('repeat_on_1');?></div>
                <br>
            <select class="form-control" name="repeat_on_2" id="repeat_on_2">
                <option value="">Select</option>
                <option value="1" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_2'] == 1 ? "selected" : ""; ?> >Sunday</option>
                <option value="2" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_2'] == 2 ? "selected" : ""; ?> >Monday</option>
                <option value="3" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_2'] == 3 ? "selected" : ""; ?>  >Tuesday</option>
                <option value="4" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_2'] == 4 ? "selected" : ""; ?> >Wednesday</option>
                <option value="5" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_2'] == 5 ? "selected" : ""; ?> >Thirsday</option>
                <option value="6" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_2'] == 6 ? "selected" : ""; ?> >Friday</option>
                <option value="7" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_2'] == 7 ? "selected" : ""; ?> >Saturday</option>
            </select>
            <div style='color:red'><?php echo form_error('repeat_on_2');?></div>
            <br>
            <select class="form-control" name="repeat_on_3" id="repeat_on_3">
                <option value="">Select</option>
                <option value="1" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_3'] == 1 ? "selected" : ""; ?>>Month</option>
                <option value="3" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_3'] == 3 ? "selected" : ""; ?>>3 Month</option>
                <option value="4" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_3'] == 4 ? "selected" : ""; ?>>4 Month</option>
                <option value="6" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_3'] == 6 ? "selected" : ""; ?>>6 Month</option>
                <option value="12" <?= isset($eventInfo) &&  $eventInfo['recurrence_type'] == 2 &&  $eventInfo['repeat_on_3'] == 12 ? "selected" : ""; ?>>Year</option>
            </select>
            <div style='color:red'><?php echo form_error('repeat_on_3');?></div>
            <?php echo form_error('recurrence_type',"<div style='color:red'>","</div>");?>  
         </div>

         <input type= "hidden" name="id" value="<?= $eventInfo['id']; ?>">
         <div class="form-group">
            <?php echo form_submit(['name'=>'update','value'=>'Update','class'=>'btn btn-success btn-lg btn-block']);?>
         </div>
         </form>
         <?php echo form_close();?>
         <div class="text-center"> <a href="<?php echo site_url('Event/list');?>">Event List</a></div>
      </div>
   </body>
</html>


<script>
    $(document).ready(function () {

        $("#start_date").datepicker({
            dateFormat: "dd-M-yy",
            minDate: 0,
            onSelect: function (date) {
                var end_date = $('#end_date');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                end_date.datepicker('setDate', minDate);
                startDate.setDate(startDate.getDate() + 30);
                //sets end_date maxDate to the last day of 30 days window
                end_date.datepicker('option', 'maxDate', startDate);
                end_date.datepicker('option', 'minDate', minDate);
                $(this).datepicker('option', 'minDate', minDate);
            }
        });
        $('#end_date').datepicker({
            dateFormat: "dd-M-yy"
        });
    });
</script>