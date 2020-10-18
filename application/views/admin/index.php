<!DOCTYPE html>
<html lang="en">

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

</head>
<body class="fix-header fix-sidebar">
    
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="card">
                                <div class="card-body">
                                   <h1>Hello,&nbsp;<?php echo $name[0]->name;?></h1>
                                </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php
                                        $rev = 0; 
                                        foreach ($revenue as $key) {
                                            $rev += $key->totalPrice;
                                    }?>
                                        <?php echo number_format($rev, 0, ',', '.') ?></h2>
                                    <p class="m-b-0">Total Revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php
                                        $sale = 0; 
                                        foreach ($sales as $key) {
                                            $sale += $key->quantity;
                                    }?>
                                        <?php echo number_format($sale, 0, ',', '.') ?>
                                    </h2>
                                    <p class="m-b-0">Sales</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-ticket f-s-40 color-warning"></i></span>
                                </div>
                               <div class="media-body media-text-right">

                                    <h2>
                                        <?php
                                        $total = 0; 
                                        foreach ($countTicket as $key) {
                                            $total += $key->remainTicket;
                                    }?>
                                        <?php echo number_format($total, 0, ',', '.') ?>
                                    </h2>
                                    <p class="m-b-0">Total Tickets</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $countUser[0]->id;?></h2>
                                    <p class="m-b-0">Customer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row bg-white m-l-0 m-r-0 box-shadow ">

                    <!-- column -->
                     <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="year-calendar"></div>
                                </div>
                            </div>
                        </div>
                    <!-- column -->

                    <!-- column -->
                     <!-- <div class="col-lg-4">
                        <div class="card">
                            <h4>Available Ticket in This Month</h4>
                            <hr>
                            <div class="card-body browser">
                            <?php 
                            $no = 1;
                            foreach ($allTicket as $key): ?>

                            <?php if ($no%2 == 0) { ?>
                                <p class="m-t-30 f-w-600"><?php echo $key->name?><span class="pull-right"><?php echo number_format($key->persen, 0);?>%</span></p>
                                <div class="progress">
                                    <div role="progressbar" style="width: <?php echo $key->persen ?>%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                                </div>
                            <?php }else{?>

                             <p class="m-t-30 f-w-600"><?php echo $key->name?><span class="pull-right"><?php echo number_format($key->persen, 0);?>%</span></p>
                                <div class="progress">
                                    <div role="progressbar" style="width: <?php echo $key->persen ?>%; height:8px;" class="progress-bar bg-warning wow animated progress-animated"> <span class="sr-only">60% Complete</span> </div>
                                </div>
                            <?php } ?>
                            <?php 
                            $no++;
                            endforeach?>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- column -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h3>Recent Orders </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($recent as $key) {?>
                                            <tr>
                                                <td>
                                                    <div class="round-img">
                                                        <a href=""><img src="<?php echo base_url();?>assets/imgEvent/<?php echo $key->pictureUser?>" alt=""></a>
                                                    </div>
                                                </td>
                                                <td><?php echo $key->name?></td>
                                                <td><span><?php echo $key->quantity?> Tickets</span></td>
                                                <td><span><?php echo $key->totalPrice?></span></td>
                                                <td><span <?php if($key->status == 'pending'){?> class="badge badge-warning"<?php }else{?> class="badge badge-success" <?php } ?> ><?php echo $key->status?></span></td>
                                            </tr>
                                                
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
   