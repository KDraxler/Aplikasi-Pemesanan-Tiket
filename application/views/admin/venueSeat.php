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
                    <h3 class="text-primary">Venue Event</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Venue Event</li>
                    </ol>
                </div>
            </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="example">
                        <thead>
                            <th>ID Venue</th>
                            <th>Venue Name</th>
                            <th>City</th>
                            <th>Country</th>
                            <th> </th>
                        </thead>
                        <tbody>
                        <?php foreach ($venue_list as $key) {?>
                        <tr>
                            <td><?php echo $key->idVenue; ?></td>
                            <td><?php echo $key->venue; ?></td>
                            <td><?php echo $key->city; ?> </td>
                            <td><?php echo $key->country; ?> </td>
                            <td>
                            <td>
                            <a href="javascript:void(0);" data-id="<?php echo $key->idVenue ; ?>" data-pict="<?php echo $key->photo ; ?>" data-toggle="modal" data-target="#edit-data">
                            <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-primary"><span class="fa fa-plus"></span>&nbsp;Add Photo</button></a>
                            <a href="<?php echo site_url()?>/EventSeat/byID/<?php echo $key->idVenue; ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>&nbsp;Seat Zone </button></a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal Ubah -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade-in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Data</h4>
                </div>
                 <?php echo form_open_multipart('HomeVenue/updatePhoto'); ?>
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Photo</label>
                                <div class="col-lg-12">
                                    <input type="hidden" class="form-control" id="id" name="id">
                                    <input type="file" class="form-control" id="pict" name="pict">
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
                modal.find('#pict').attr("value",div.data('pict'));
            });
        });
    </script>