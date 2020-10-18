

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="50 50 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light" >
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="<?php echo base_url();?>assets/img/logo.png" alt="homepage" width="150"></b>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse "></div>
                    <!-- User profile and search -->
                    <ul class=" navbar-nav my-lg-0" style="padding-top: 10px; padding-bottom: 10px">
                        <!-- Messages -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell" style="font-size:30px"></i><div class="notify"> 
                            <?php foreach($notif as $a){
                                if ($a->statusNotif == 0) { ?>
                                     <span class="heartbit"></span>
                                      <span class="point"></span>
                                <?php } }?>
                            </div>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2"  id="notification">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have <?php echo $countNotif[0]->id ?>  new updates</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <?php if(is_array($notif)){ 
                                                foreach ($notif as $key) {?>

                                                <a href="<?php echo site_url()?>/Welcome/update/<?php echo $key->idUser?>">
                                                <div class="user-img"> <img src="<?php echo base_url();?>assets/imgEvent/<?php echo $key->pictureUser ;?> " alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5><?php echo $key->name?></h5> <span class="mail-desc">Just Register A New Account</span>
                                                </div>
                                            </a>
                                            <?php }} ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Messages -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url();?>assets/imgEvent/<?php echo $name[0]->pictureUser?>" alt="user" class="profile-pic" /><div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="<?php echo site_url();?>/AdminDetail"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li><a href="<?php echo site_url();?>/Login"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

        <!-- End header header 