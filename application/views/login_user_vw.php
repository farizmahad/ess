<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>Sistem Approval | PT. Aartijaya</title>

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
		<header id="header-inverse">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>-->
            <a class="navbar-brand" href="index-register.html"></a>
          </div>

         
        </div><!-- /.container -->
      </nav>
    </header>-->
    <!--Header End-->
    
    <!-- Landing Page Contents
    ================================================= -->
    <div id="lp-register">
    	<div class="container wrapper">
        <div class="row">
        	
        	<div class="col-sm-6 col-sm-offset-1">
            <div class="reg-form-container"> 
            
              <!-- Register/Login Tabs-->
              <div class="reg-options">
                <ul class="nav nav-tabs">
                  <!--<li><a href="#register" data-toggle="tab">Register</a></li>-->    
                  <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                </ul><!--Tabs End-->
              </div>
              
              <!--Registration Form Contents-->
              <div class="tab-content">
                  
                  <!--Login-->
                <div class="tab-pane active" id="login">
                  
                <div class="text-center"><img src="<?php echo base_url(); ?>assets/images/aarti_jaya_pt_3.png" alt="logo" class="img-fluid"/></div>
                  <p class="text-muted" align="center">Log into your account</p>
                  
                  <!--Login Form-->
                   
               <!--
                <form method="POST" action="<?php echo base_url(); ?>Auth/login" id="form1">
                <center>
                    <?php echo $this->session->flashdata('message');?><br>
                </center>
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="myemail" class="sr-only">Email</label>
                        <input id="myemail" class="form-control input-group-lg email required email" type="email" name="identity" title="Enter Email" placeholder="Email Anda"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password" class="sr-only">Password</label>
                        <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password"/>
                      </div>
                    </div>
                  <p align="center"><a href="#">Lupa Password?</a></p>
                    <div class="text-center">
                       <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Log in</strong></button>
                    </div>
                </div>
                </form>
              -->

              <form id="form1" method="get" action="">
      <fieldset>
        <legend>
           Form pendaftaran
        </legend>
        <p>
          <!--perhatikan antara label for ="name",id="name",name='nama'
          semua harus sama -->
          <label for="nama">Name</label>
             <!--perhatikan class="required" dan minlength="2" ini 
              adalah format cek validasi gaya jquery 
              validasi apa saja yang didukung lihat lengkapnya diwebsite -->
          <input id="nama" name="nama" size="25" class="required" minlength="2" />
        </p>
        <p>
        <label for="umur">umur</label>
      
        <input id="umur" name="umur" size="25" class="required number" />
        </p>
        <p>
          <label for="email">E-Mail</label>
        
          <input id="email" name="email" size="25"  class="required email" />
        </p>
        <p>
          <label for="url">URL</label>
          <em> </em>
          <input id="url" name="url" size="25"  class="url" value="" />
        </p>
        <p>
          <label for="ccomment">Your comment</label>
                <textarea id="comment" name="comment" cols="20"  class="required" minlength="10"></textarea>
        </p>
        <p>
          <input class="submit" type="submit" value="Daftar"/>
        </p>
      </fieldset>
    </form>
                  
                
              </div>
            </div>
          </div>
            
            <div class="col-sm-5">
                <div class="intro-texts">
                    <h1 class="text-white">Sistem Approval PT. Aartijaya</h1>
                    <p>Manfaatkan Sistem Approval untuk memenuhi segala keperluan Anda selama beraktifitas di PT. Aartijaya. <br /> Saat ini Anda dapat meminta pengadaan berupa Barang dan Jasa yang Anda perlukan untuk menunjang kegiatan kerja di PT. Aartijaya. <br /> </p>
                  <!--<button class="btn btn-primary">Learn More</button>-->
                </div>
          </div>
        </div>
        <!--<div class="row">
          <div class="col-sm-6 col-sm-offset-6">
          
            <!--Social Icons-->
            <!--<ul class="list-inline social-icons">
              <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
              <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
              <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
            </ul>
          </div>
        </div>-->
      </div>
    </div>

    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>

    <!-- Scripts
    ================================================= -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.appear.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.incremental-counter.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>

   <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="jquery.validate.js"></script>
    <script type="text/javascript" src="messages_id.js"></script>

<!--
   <script type="text/javascript">
       $(document).ready(function(){
          $("#frm-mhs").validate(

            {
              rules:{
                myemail :{
                  
                  email:true
                }
              },
              messages:{
                myemail: {
      email: "Alamat email harus diisi"
    }
              }



            });
       });
    </script>
-->
	</body>
</html>
