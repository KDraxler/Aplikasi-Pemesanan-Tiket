<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="<?php echo base_url();?>assets/img/logos.png" alt="IMG">
        </div>
        <?php echo form_open('Login/cekLogin','class = "login100-form" '); ?>
          <span class="login100-form-title">
           Login
          </span>
          <?php if(!empty(validation_errors())){ ?>
        <div class="alert alert-warning alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <?php echo validation_errors(); ?>
        </div>
          <?php }?>
          <div class="wrap-input100">
            <input class="input100" type="text" name="username" id="username" placeholder="username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
              Login
            </button>
          </div>

          <div class="text-center p-t-136">
            <a class="txt2" href="<?php echo site_url();?>/Register">
              Create your Account
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->  
  <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url();?>assets/js/select2.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->


</body>
</html>
        

