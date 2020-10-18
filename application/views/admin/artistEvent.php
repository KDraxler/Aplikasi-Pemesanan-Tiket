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
                    <h3 class="text-primary">Event Artist</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">EventArtist</li>
                    </ol>
                </div>
            </div>
            <div class="form-group text-right">
					<button data-toggle="modal" data-target="#tambah-data" class="btn btn-outline-secondary"><span class="fa fa-plus"></span> Add</button>
				</div>
	<center>
	<div class="row">
    <?php foreach ($eventartist_list as $key){ ?>
    <div class="col-lg-3 col-xlg-3 col-md-5">
		<div class="card" style="width: 275; height: 275">
            	<center><a href="<?php echo base_url()?>assets/imgEvent/<?php echo $key->picture;?>"><img src="<?php echo base_url()?>assets/imgEvent/<?php echo $key->picture;?>" class="img-circle" width="100" height="100" /></a>
            <h4 class="card-title"><?php echo $key->artist ; ?></h4>
            <div class="card-body">
            <div class="row text-center justify-content-md-center">
            	<div class="col-4">
            		<a href="javascript:void(0);" data-id="<?php echo $key->idArtist ; ?>" data-name="<?php echo $key->artist ; ?>" data-gender="<?php echo $key->gender ; ?>" data-birth="<?php echo $key->birthdate ; ?>" data-pic="<?php echo $key->picture ; ?>" data-toggle="modal" data-target="#edit-data">
                    <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-secondary"><span class="fa fa-edit"></span></button></a>
                </div>
                <div class="col-4">
                	<a href="<?php echo site_url()?>/EventArtist/delete/<?php echo $key->idArtist; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data permanently?'); "><span class="fa fa-trash"></span></a>
                </div>
            </div>
            
        </div>
    </center>
</div>
</div>

<?php } ?>
</div>
</center>

	<!-- Modal Tambah -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade-in">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Add Data</h4>
	            </div>
	            <?php echo form_open_multipart('EventArtist/create'); ?>
		            <div class="modal-body">
		            	<div class="container-fluid">
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Name</label>
		                        <div class="col-lg-12">
		                            <input type="text" class="form-control" name="name" placeholder="Input Artist Name" required>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Gender</label>
		                        <div class="col-lg-12">
		                        	<textarea class="form-control" name="gender" placeholder="Gender" required></textarea>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Birth Date</label>
		                        <div class="col-lg-12">
		                        	<input type="date" class="form-control" name="birth" required>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Picture</label>
		                        <div class="col-lg-12">
		                            <input type="file" class="form-control" name="pic" required>
		                        </div>
		                    </div>
		                </div>
		            </div>
		                <div class="modal-footer">
		                    <button class="btn btn-info" type="submit"> Save&nbsp;</button>
		                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
		                </div>     
	            	</div>
	            <?php echo form_close();?>
	        </div>
	    </div>
	</div>
	<!-- END Modal Tambah -->
	<!-- Modal Ubah -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade-in">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Update Data</h4>
	            </div>
	             <?php echo form_open_multipart('EventArtist/update'); ?>
		            <div class="modal-body">
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Name</label>
		                        <div class="col-lg-12">
		                        	<input type="hidden" id="id" name="id">
		                            <input type="text" class="form-control" id="name" name="name" placeholder="Input Artist Name" required>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Gender</label>
		                        <div class="col-lg-12">
		                        	<textarea class="form-control" id="gender" name="gender" placeholder="Gender" required></textarea>
		                        </div>
		                    </div>
		                     <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Birth Date</label>
		                        <div class="col-lg-12">
		                        	<input type="date" class="form-control" id="birth" name="birth" required>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Photo</label>
		                        <div class="col-lg-12">
		                            <input type="file" class="form-control" id="pic" name="pic">
		                        </div>
		                    </div>
		                </div>
		                <div class="modal-footer">
		                    <button class="btn btn-info" type="submit"> Save&nbsp;</button>
		                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
		                </div>
	                <?php echo form_close();?>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- END Modal Ubah -->
	<script>
	    $(document).ready(function() {
	        // Untuk sunting
	        $('#edit-data').on('show.bs.modal', function (event) {
	            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
	            var modal          = $(this)
 
	            // Isi nilai pada field
	            modal.find('#id').attr("value",div.data('id'));
	            modal.find('#name').attr("value",div.data('name'));
	            modal.find('#gender').html(div.data('gender'));
	            modal.find('#birth').attr("value",div.data('birth'));
	            modal.find('#pic').attr("value",div.data('pic'));
	        });
	    });
	</script>
