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
    <link href="<?php echo base_url();?>assets/css/customz.css" rel="stylesheet">
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
                    <h3 class="text-primary">Schedule Detail</h3> </div>
                <div class="col-md-7 align-self-center">
                   <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url()?>/EventSchedule">Event Schedule</a></li>
                        <li class="breadcrumb-item active">Schedule Detail</li>
                    </ol>
                </div>
            </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-elements">
                                    <?php echo form_open_multipart('EventSchedule/updateData/'.$this->uri->segment(3)); ?>
                                        <div class="row">
                                            <div class="col-lg-6">
                                            <?php foreach ($list as $key) {
                                                $cate = $key->cat_id;
                                                $art = $key->artist_id;
                                                $ven = $key->venue_id;
                                                ?>

                                                <div class="form-group">
                                                    <label>Event Name</label>
                                                    <input type="text" class="form-control" id="event_id" name="event_id" value="<?php echo $key->event_id; ?>" hidden>
                                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $key->name; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="form-control" name="cat_id" id="cat_id">               
                                                        <?php foreach($cat_list as $row) {
                                                        $cat = $row->idCat;
                                                        ?>
                                                        <option <?php if($cat == $cate) echo"selected"; ?> value="<?php echo $row->idCat;?>"><?php echo $row->category;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Artist</label>
                                                    <select class="form-control" name="artist_id" id="artist_id">               
                                                        <?php foreach($artist_list as $row) { 
                                                            $artist = $row->idArtist;
                                                            ?>
                                                        <option <?php if($artist == $art) echo"selected"; ?> value="<?php echo $row->idArtist;?>"><?php echo $row->artist;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Venue</label>
                                                    <select class="form-control" name="venue_id" id="venue_id">                
                                                    <?php foreach($venue_list as $row) { 
                                                        $venue = $row->idVenue;
                                                        ?>
                                                    <option <?php if($venue == $ven) echo"selected"; ?> value="<?php echo $row->idVenue;?>"><?php echo $row->venue;?>,<?php echo $row->city;?>,<?php echo $row->country;?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input class="form-control" type="date" name="date" id="date" value="<?php echo $key->date; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Start Time</label>
                                                    <input class="form-control" type="time" name="startTime" id="startTime" value="<?php echo $key->startTime; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>End Time</label>
                                                    <input class="form-control" type="time" name="endTime" id="endTime" value="<?php echo $key->endTime; ?>">
                                                </div>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <div class="form-group text-right">
                                                <button type="button" id="update" class="btn btn-info"><span class="glyphicon glyphicon-search"></span>Update</button>
                                               <button class="btn btn-secondary" id="submit" type="submit"> Submit&nbsp;</button>
                                                <?php } ?>
                                            </div>
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                           
        </div>
    </div>

<script type="text/javascript">
    $(function () {
        $('#name').prop('disabled', true);
        $('#cat_id').prop('disabled', true);
        $('#artist_id').prop('disabled', true);
        $('#venue_id').prop('disabled', true);
        $('#date').prop('disabled', true);
        $('#startTime').prop('disabled', true);
        $('#endTime').prop('disabled', true);
        $('#submit').prop('disabled', true);

        $('#update').click(function() { 
        $('#cat_id').prop('disabled', false);
        $('#artist_id').prop('disabled', false);
        $('#venue_id').prop('disabled', false);
        $('#date').prop('disabled', false);
        $('#startTime').prop('disabled', false);
        $('#endTime').prop('disabled', false);
        $('#submit').prop('disabled', false);
        $('#update').prop('disabled', true);
    });
    }); 
</script>
    <!-- Bootstrap tether Core JavaScript -->