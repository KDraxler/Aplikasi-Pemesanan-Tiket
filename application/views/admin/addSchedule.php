<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/awal/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="<?php echo base_url();?>assets/awal/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/awal/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/awal/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/awal/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/awal/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/awal/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datatable/datatables.min.css">
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/datatable/datatables.min.js"></script>

    
    
</head>
<body class="fix-header fix-sidebar">
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Schedule</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Schedule</li>
                    </ol>
                </div>
            </div>

<div class="container-fluid">
	<div class="card">
	<div class="card-body">
        <div class="basic-elements">
            <?php echo form_open_multipart('EventSchedule/addData'); ?>
            <?php if(!empty(validation_errors())){ ?>
        	<br>
        	<div class="container-fluid">
	     	<div class="alert alert-warning alert-dismissible align-self-center" role="alert">
       			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
       			<span aria-hidden="true">&times;</span>
       			</button>
       		<?php echo validation_errors(); ?>
        	</div>
        	</div>
     		<?php }?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        	<label>Event Name</label>
                        	<select class="form-control" name="event_id">
								<option  value="">Select Event Name</option>                   
            					<?php foreach($name_list as $row) { ?>
                				<option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
            					<?php } ?>
							</select>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="cat_id">
								<option  value="">Select Category</option>                   
            					<?php foreach($cat_list as $row) { ?>
                				<option value="<?php echo $row->idCat;?>"><?php echo $row->category;?></option>
            					<?php } ?>
							</select>
                        </div>
                        <div class="form-group">
                            <label>Artist</label>
                            <select class="form-control" name="artist_id">
								<option  value="">Select Artist</option>                   
            					<?php foreach($artist_list as $row) { ?>
                				<option value="<?php echo $row->idArtist;?>"><?php echo $row->artist;?></option>
            					<?php } ?>
							</select>
                        </div>
                        <div class="form-group">
                            <label>Venue</label>
                            <select class="form-control" name="venue_id">
								<option  value="">Select Venue</option>                   
            					<?php foreach($venue_list as $row) { ?>
                				<option value="<?php echo $row->idVenue;?>"><?php echo $row->venue;?>,<?php echo $row->city;?>,<?php echo $row->country;?></option>
            					<?php } ?>
							</select>
                        </div>
                        <div class="form-group">
                        	<label>Date</label><br>
                        	<input type="date" name="date" class="form-control">
                        </div>
                        <div class="form-group">
                        	<label>Start Time</label><br>
                        	<input type="time" name="startTime" class="form-control">
                        </div> 
                        <div class="form-group">
                        	<label>End Time</label><br>
                        	<input type="time" name="endTime" class="form-control">
                        </div>
                        <div class="form-group">
                        	<button class="btn btn-success" type="submit"> Submit&nbsp;</button>
                        </div>                                                    
                    </div>
                </div>
            <?php echo form_close();?>
        </div>
    </div>
    </div>
</div>
</div>

	
    <!-- Bootstrap tether Core JavaScript -->

    <script src="<?php echo base_url();?>assets/awal/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/awal/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>assets/awal/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>assets/awal/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url();?>assets/awal/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->

    <script src="<?php echo base_url();?>assets/awal/js/scripts.js"></script>
    <!-- scripit init-->

    <script src="<?php echo base_url();?>assets/awal/js/custom.min.js"></script>

<script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>

</body>
</html>