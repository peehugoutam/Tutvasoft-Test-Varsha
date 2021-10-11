<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
      <title>Event List</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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
            width: 900px;
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
         .signup-form .form {
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
         .signup-form .form a {
            color: #5cb85c;
            text-decoration: none;
         }	
         .signup-form .form a:hover {
            text-decoration: underline;
         }  
         table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
         }

         td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
         }

         tr:nth-child(even) {
            background-color: #dddddd;
         }
      </style>
   </head>
   <body>
      <div class="signup-form">
         <h2>Event List</h2>
         <div class="form">
            <div class="form-group">
               <a href="<?php echo site_url('event');?>" class="btn btn-success btn-lg btn-block" style="color:#fff;">Create Event</a>
            </div>
            <div class="form-group">
               <table  id="example" class="display" style="width:100%">
                  <tr>
                     <th>SNo.</th>
                     <th>Title</th>
                     <th>Date</th>
                     <th>Occurance</th>
                     <th>Action</th>
                  </tr>
                  <?php  
                     if(!empty($event_list)){ 
                        $sno = 1;
                        foreach($event_list as $val){ 
                  ?>
                  <tr>
                     <td><?= $sno ?></td>
                     <td><?= $val['title']; ?></td>
                     <td><?= $val['start_date']." to ".$val['end_date']; ?></td>
                     <td><?= $val['recurrence_type'] == 1 ? get_repeat1($val['repeat_1'])." ".get_repeat2($val['repeat_2']) : get_repeat_on1($val['repeat_on_1'])." ".get_repeat_on1($val['repeat_on_2'])." ".get_repeat_on1($val['repeat_on_3']); ?></td>
                     <td>
                        <div class="text-center">
                            <a href="<?php echo site_url('event/edit/'.$val['id']); ?>">
                                Edit
                            </a>
                            <a href="<?php echo site_url('event/view/'.$val['id']); ?>">
                                view
                            </a>
                            <a onClick="return confirm('Are you sure you want to delete?')" href="<?php echo site_url('event/delete/'.$val['id']); ?>">
                                Delete
                            </a>
                        </div>
                     </td>
                  </tr>
                  <?php $sno++; }} ?>
               </table>
            </div>
         </div>
      </div>
   </body>
</html>
