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
                    <h3 class="text-primary">Add Admin</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Admin</li>
                    </ol>
                </div>
            </div>
      <div class="container-fluid">
		<div class="card">
            <div class="card-body">
            <div class="form-group text-right">
					<button data-toggle="modal" data-target="#tambah-data" class="btn btn-outline-secondary"><span class="fa fa-plus"></span> Add</button>
				</div>
                <div class="table-responsive">
                    <table class="table" id="example">	
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Address</th>
								<th>Phone Number</th>
								<th>Email</th>
								<th>Username</th>
								<th>Picture</th>
								<th>  </th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($admin_list as $key){ ?>
							<tr>
							<td><?php echo $key->idUser ; ?></td>
							<td><?php echo $key->name ; ?></td>
							<td><?php echo $key->address ; ?></td>
							<td><?php echo $key->phoneNumber ; ?></td>
							<td><?php echo $key->email ; ?></td>
							<td><?php echo $key->username ; ?></td>
							<td><img src="<?php echo base_url();?>assets/imgEvent/<?php echo $key->pictureUser;?>" class="img-thumbnail" width="50"></td>
							<td>
								<a href="<?php echo site_url()?>/Admin/delete/<?php echo $key->idUser; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data permanently?'); "><span class="fa fa-trash"></span></a>
							</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
            
	<!-- Modal Tambah -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade-in">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Add Data</h4>
	            </div>
	            <?php echo form_open_multipart('Admin/create'); ?>
		            <div class="modal-body">
		            	<div class="container-fluid">
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Name</label>
		                        <div class="col-lg-12">
		                            <input type="text" class="form-control" name="name" placeholder="Input Artist Name" required>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Address</label>
		                        <div class="col-lg-12">
		                        	<textarea class="form-control" name="add" placeholder="Address" required></textarea>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Phone Number</label>
		                        <div class="col-lg-12">
		                        	<input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
		                        </div>
		                    </div>
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Email</label>
		                        <div class="col-lg-12">
		                        	<input type="text" class="form-control" name="email" placeholder="Email" required>
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
	<!-- END Modal Ubah -->

	
    <!-- Bootstrap tether Core JavaScript -->