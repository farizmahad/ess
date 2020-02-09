<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>Lupa Password</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
     <script src="<?php echo base_url(); ?>assets/js/validate/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate/messages_id.js"></script>
  

    <style type="text/css">label {
        width:20em;
        float: left;
      }
      label.error {
        font-family: verdana;
        float: right;
        color: red;
        padding-left: .1em;
      
      }
  </style>

     <script>$(document).ready(function() {
        $(".form1").validate();
      });
</script>
	</head>
  <body>

    <!-- Header
    ================================================= -->
		
    <!--Header End-->

    <div class="google-maps">
      <div><img src="http://bursasajadah.com/assets/images/bursa-jkt3.jpg" width="1700" height="300"></div>
    </div>
    <div id="page-contents">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-10 col-md-offset-1">
            <div class="contact-us">
            	<div class="row">
            		<div class="col-md-8 col-sm-7">
                  <h4 class="grey">Lupa Password</h4>
                  <?php echo $this->session->flashdata('message');?><br>
                 <form name="Login_form" id='Login_form' class="form1" method="POST" action="<?php echo base_url(); ?>Login_User/aksi_input_email">
                    <div class="form-group">
                      <label>Email</label>
                      <input id="email" name="email" size="25"  class="email form-control input-group-lg" placeholder="Email" required
oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')"

                      >
                    </div>
                    
                    
                 
                  <button class="btn-primary" type="submit">Submit</button>
                  <?php echo form_close();?>
                </div>
            		<div class="col-md-4 col-sm-5">
                  
                </div>
            	</div>
            </div>
          </div>
    		</div>
    	</div>
    </div>

    <!-- Footer
    ================================================= -->
    
    
    <!-- Scripts
    ================================================= -->
    
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    
  </body>
</html>


