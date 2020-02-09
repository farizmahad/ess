<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is social network html5 template available in themeforest......" />
    <meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
    <meta name="robots" content="index, follow" />
    <title>About Me | Learn Detail About Me</title>

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
  </head>
  <body>

  <?php foreach($detail_pekerjaan as $pek):?>
    <div class="container-fluid">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
        <div class="timeline-cover"> <!-- Edited -->

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
            <div class="col-md-3">
                <div class="profile-info">
                  <?php if($pek->foto){?>
                  <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $pek->foto; ?>" alt="" class="img-responsive profile-photo" />
                <?php } ?>
                  <h3><?php echo $pek->first_name; ?> <?php echo $pek->last_name; ?></h3>
                  <p class="text-muted"><?php echo $pek->nama_jabatan; ?></p>

                      <!--Edit Profile Menu-->
                      <ul class="edit-menu">
                        <li><i class="icon ion-ios-information-outline"></i><a href="edit-profile-basic.html">Summary</a></li>
                        <li class="active"><i class="icon ion-ios-briefcase-outline"></i><a href="edit-profile-work-edu.html">Overview</a></li>
                        <!--<li><i class="icon ion-ios-briefcase-outline"></i><a href="edit-profile-work-edu.html">Compensation</a></li>
                        <li><i class="icon ion-ios-briefcase-outline"></i><a href="edit-profile-work-edu.html">Career</a></li>-->
                        <li><i class="icon ion-ios-briefcase-outline"></i><a href="edit-profile-work-edu.html">Performance</a></li>
                        <li><i class="icon ion-ios-briefcase-outline"></i><a href="edit-profile-work-edu.html">Feedback</a></li>
                 
                      </ul>

                </div>
            </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="timeline.html" class="active">Job Details</a></li>
                  <li><a href="timeline-about.html">Management Chain</a></li>
                  <li><a href="timeline-album.html">Organizations</a></li>
                  <li><a href="timeline-friends.html">Timeline</a></li>
                  <li><a href="timeline-about-overview-employee-history.html">Employee History</a></li>
                  <li><a href="timeline-friends.html">Manager History</a></li>
                  <li><a href="timeline-friends.html">Worker History</a></li>
                </ul>
               
              </div>
            </div>
          </div>
          <?php endforeach; ?>