	<!DOCTYPE html>
	<html lang="zxx" class="no-js" id="refreshTime">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Conference</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/font-awesome.min.css">
			<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/bootstrap.css">		
			<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/animate.min.css">
			<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/owl.carousel.css">
			<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/main.css">
			<style type="text/css">
				.price-title h2 {
					background: #ef5e4e none repeat scroll 0 0;
					color: #fff;
					display: inline-block;
					font-size: 20px;
					font-weight: 600;
					line-height: 55px;
					margin-top: -1px;
					text-align: center;
					width: 199px;
					border-radius: 50px;
					padding-top: 10px;
					padding-bottom: 10px;
				}
			</style>
		</head>
<body>
<header id="header" id="home" >
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="<?php echo site_url();?>/HomeUser/lihat"><img src="<?php echo base_url();?>assets/img/logo1.png" alt="" title="" width="200"/></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="<?php echo site_url();?>/HomeUser/lihat">Home</a></li>
				          <li><a href="#speakers">Latest Event</a></li>
                    <li class="menu-has-children"><a href="<?php echo site_url();?>/HomeUser/allEvent">All Event</a>
                        <ul>
                        <div class="col-md-6 text-left text-uppercase">
                          <b><p style="color: black">Category</p></b>
                          <?php foreach ($cat_list as $key) {?>
                          <li><a href="<?php echo site_url();?>/Search/byCat/<?php echo $key->idCat;?>"><?php echo $key->category;?></a></li>
                          <?php }?>
                        </div>
                        <br>
                        <div class="col-md-6 text-left text-uppercase">
                          <b><p style="color: black">Artist</p></b>
                          <?php foreach ($artist_list as $key) {?>
                          <li><a href="<?php echo site_url();?>/Search/byArtist/<?php echo $key->idArtist;?>"><?php echo $key->artist;?></a></li>
                          <?php }?>
                        </div>
                        </ul>
                  </li>
                  <li class="menu-has-children"><a href="<?php echo site_url();?>/Order/invoice">Invoice</a>
                       
                  </li>

                  <li class="menu-has-children"><a href=""><?php if(empty($username)){ ?>Account<?php }else{?><span class="fa fa-user"></span>&nbsp;<?php echo $username;}?></a>
                        <ul>
                          <?php if(empty($username)){ ?>
                          <li><a href="<?php echo site_url();?>/Login">Login</a></li>
                          <li><a href="<?php echo site_url();?>/Register">Register</a></li>
                           <?php }else{?>
                          <li><a href="<?php echo site_url();?>/UserDetail">Profile</a></li>
                          <li><a href="<?php echo site_url();?>/Login/logout">Logout</a></li>
                          <?php }?>
                        </ul>
                  </li>

                   <?php if(!empty($username)){?>
                  <li class="menu-has-children"><a href=""><span class="fa fa-bell"></span>
                  	<?php if(!empty($notif)){?>
                  	<sup>
                  		<?php $i = 0; foreach($notif as $a){
                                if ($a->statusNotif == 0) {
                                    $i++;
                                }elseif ($a->statusNotif == 1){
                                    $i - 1;
                                }
                            }
                            echo $i;?></sup></a>
                        <ul>
                       <?php if(is_array($notif)){ 
                          	foreach($notif as $key){?>
                          		<li><a href="<?php echo site_url()?>/HomeUser/update/<?php echo $key->idOrder?>"><h5>ID ORDER : <?php echo $key->idOrder?></h5> Your Order Has Been Confirmed</a></li>
                          <?php }}?>
                        </ul>
                  </li>
                  <?php }}?>

				          <li><a class="ticker-btn" href="<?php echo site_url();?>/Order/orderUserTable"><span class="fa fa-lg fa-shopping-cart"></span></a></li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->