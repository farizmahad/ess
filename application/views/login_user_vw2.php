<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
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
    <script src="<?php echo base_url(); ?>assets/js/validate/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate/messages_id.js"></script>
   <link href="bootstrap.min.css" rel="stylesheet">
    <style type="text/css">label {
        width:20em;
        float: left;
      }
      label.error {
        font-family: lato;
        <?php
        /*
        float: right;
        */
        ?>
        color: #6495ED;
        <?php /*
        padding-left: .1em;
        */
        ?>
      }
</style>
<!--
    <script>$(document).ready(function() {
        $(".form1").validate();
      });
    -->
</script>
  </head>
  <body>
  <header id="header-inverse">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">
         <div class="navbar-header">
            <a class="navbar-brand" href="index-register.html"></a>
          </div>
        </div>
      </nav>
    </header>-->
  
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
              
              
              <div class="tab-content">
                  
                  <!--Login-->
                <div class="tab-pane active" id="login">
                  
                <div class="text-center"><img src="<?php echo base_url(); ?>assets/images/aarti_jaya_pt_3.png" alt="logo" class="img-fluid"/></div>
                <form name="Login_form" id='Login_form' class="form1" method="POST" action="<?php echo base_url(); ?>Auth/login">
                    <center>
            <?php echo $this->session->flashdata('message');?><br>
                </center>
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="email" class="sr-only">Email</label>
                          <input id="email" name="identity" size="25"  class="required email form-control input-group-lg" / placeholder="Email" >
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" class="required form-control input-group-lg" type="password" name="password"  placeholder="Password"/>
                      </div>
                    </div>
                  <!--Login Form Ends--> 
                  <p align="center"><a href="<?php echo base_url(); ?>lupa-password" target="_blank">Lupa Password?</a></p>
                    <div class="text-center"><button class="btn btn-primary" type="submit">Masuk</button></div>
                </div>
                  </form>
              </div>
            </div>
          </div>
            
            <div class="col-sm-5">
                <div class="intro-texts">
                    <h1 class="text-white">Employee Self Service (ESS) <br/> PT. Aartijaya</h1>
                    <p align="justify">Employee Self Service (ESS) merupakan fitur yang ditawarkan oleh Human Resource Information System (HRIS) yang
					   modern dan canggih. ESS adalah portal yang dapat digunakan karyawan untuk masuk ke akun masing-masing dan mengakses
					   data human resource mereka. Data yang dapat diakses karyawan meliputi informasi pribadi, tugas-tugas harian, data cuti, dan
					   riwayat presensi/absensi. <br/>
					   Manfaatkan Employee Self Service untuk memenuhi segala keperluan Anda selama beraktifitas di PT. Aartijaya. 
					</p>
                </div>
          </div>
        </div>
      </div>
    </div>