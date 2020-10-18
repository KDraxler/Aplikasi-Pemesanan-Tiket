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

			<style>

.image {
  display: block;
  width: 100%;
  height: auto;

}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 20px;
  right: 0;
  height: 100%;
  width: 90%;
  opacity: 0;
  transition: .5s ease;
  background-color: #fff;
}

.container:hover .overlay {
  opacity: 0.9;
}

.text {
  color: black;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
.title{
  background: #ef5e4e none repeat scroll 0 0;
  color: #fff;
  display: inline-block;
  font-size: 20px;
  font-weight: 300;
  line-height: 55px;
  margin-top: -1px;
  text-align: center;
  width: 300px;
  border-radius: 20px;
  padding-right: 5px;
  padding-left: 5px;
}
ul.tab {
  list-style-type: none;
  margin: 3px;
  padding: 5px;
  overflow: hidden;
  border: 3px solid #f4bd00;
  background-color: #fff;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
  display: inline-block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of links on hover */
ul.tab li a:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  -webkit-animation: fadeEffect 1s;
  animation: fadeEffect 1s;
}

@-webkit-keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}

.card {
    background: #ffffff none repeat scroll 0 0;
    margin: 0 0;
    padding: 0;
    border: 0 solid #e7e7e7;
    border-radius: 5px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
}
table {
  border-collapse: collapse;
  border-radius: 5px;
  overflow: hidden;
}

.search-bg {
  height:60px;
  background:#fff;
  position:absolute;top:6px;
  left:2px;right:-6px;border-radius:12px;-webkit-box-shadow:0 4px 8px 0 rgba(0,0,0,.15);box-shadow:0 4px 8px 0 rgba(0,0,0,.15)}
.search-input-wrapper {
    position: absolute;
    top: 13px;
    left: 47px;
    right: 135px;
}
.search-form input[type=text] {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font: 300 1.25em proxima-nova,Proxima Nova,Arial,Helvetica,sans-serif;
    line-height: 1.25em;
    position: absolute;
    top: 0;
    left: 0;
    border: none;
    background-color: transparent;
    outline: none;
    padding: 9px 10px;
    width: 90%;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    color: #333;
    letter-spacing: .01em;
}

.search-submit-large {
    width: 115px;
    height: 40px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font: 600 15px proxima-nova,Proxima Nova,Arial,Helvetica,sans-serif;
    -webkit-box-flex: 0;
    -webkit-flex: 0 0 105px;
    -ms-flex: 0 0 105px;
    flex: 0 0 105px;
    padding: 0;
    background: #161616;
    border: 1px solid #161616;
    border-radius: 3px;
    text-decoration: none;
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    color: #fff;
    -webkit-transition: .1s;
    transition: .1s;
    text-align: center;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: pointer;
    line-height: 37px;
    -webkit-appearance: none;
    background: #161616;
    border-radius: 6px;
    height: 40px;
    position: absolute;
    top: 9px;
    right: 5px;
    display: block;
}
/* width */
.scroll::-webkit-scrollbar {
    width: 10px;
}

/* Track */
.scroll::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px; 
}
 
/* Handle */
.scroll::-webkit-scrollbar-thumb {
    background: black;
    border-radius: 10px;
}

/* Handle on hover */
.scroll::-webkit-scrollbar-thumb:hover {
    background: black; 
}
.table>tbody>tr.no-hover:hover {
    background-color: #ffffff;
    color: #000;
}

.modal-dialog1 {
    max-width: 700px;
    margin: 20rem auto;
}


</style>

		</head>
<body>
<header id="header" style="background-color: black">
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

				          <li><a class="ticker-btn" href="<?php echo site_url();?>/Order/orderUserTable"><span class="fa fa-lg fa-shopping-cart"></span></a></li>


				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header>
			  <br>
			  <br>