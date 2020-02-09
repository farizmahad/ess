<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>Reset Password</title>

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
      <script src="jquery.js"></script>
    <script type="text/javascript" src="jquery.validate.js"></script>
    <script type="text/javascript" src="messages_id.js"></script>
   <link href="bootstrap.min.css" rel="stylesheet">
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
        $("#form1").validate();
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
                  <h4 class="grey">Reset Password</h4>
                  <?php echo $this->session->flashdata('message');?><br>
                 
                     <?php echo form_open('Login_User/aksi_reset_password');?>
                    <div class="password form-group">
                      <label>Password</label>
                      <input type="password" name="password" id="password" placeholder="Password" class="form-control" required=""
oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')"
                      >
                    </div>

                    <div class="ulangpassword form-group">
                      <label>Konfirmasi Password</label>
                      <input type="password" name="ulangpassword" id="ulangpassword" oninput="cekPass()" class="form-control" placeholder="Konfirmasi Password" required="" oninvalid="this.setCustomValidity('Konfirmasi Password tidak boleh kosong')" oninput="setCustomValidity('')">	
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id_user; ?>">
<input type="hidden" name="token_id" value="<?php echo $token_id; ?>">
<label class="pesan"></label>	
                    
                 <div class="form-group">
                 <input type="submit" class="submit btn btn-primary" id="submit" value="Submit">
                  </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script type="text/javascript">
    document.getElementById("submit").disabled = true;
    function cekPass() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("ulangpassword").value;
        if (password != confirmPassword) {
        	document.getElementById("submit").disabled = true;
            $('.pesan').html('<h5 class="text-danger"> Password tidak sesuai ! </h5>');
            return false;
        }
        document.getElementById("submit").disabled = false;
        $('.pesan').html('<h5 class="text-success"> Password sesuai ! </h5>');
        return true;
    }
</script>