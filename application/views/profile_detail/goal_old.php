

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
                        <li><i class="icon ion-ios-information-outline"></i><a href="<?php echo site_url('ringkasan-profile/'.$pek->id);?>">Summary</a></li>
                        <li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>">Overview</a></li>
                       
                        <li class="active"><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>">Performance</a></li>
                        <li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('feedback/'.$pek->id);?>">Feedback</a></li>
                        <li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('personal-information/'.$pek->id);?>">Personal</a></li>
                 
                      </ul>

                </div>
            </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>" class="active">Capaian Individu</a></li>
                  <li><a href="<?php echo site_url('performance-competencies/'.$pek->id);?>">Kompetensi</a></li>
                  <li><a href="<?php echo site_url('development-items/'.$pek->id);?>">Poin Pengembangan</a></li>
                  <!--
                  <li><a href="timeline-friends.html">Development Plans</a></li>
                  <li><a href="timeline-about-overview-employee-history.html">Performances Review</a></li>
                  <li><a href="timeline-friends.html">More</a></li>
                -->
                </ul>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
   <?php foreach($detail_pekerjaan as $pek) :?>
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <?php echo $pek->foto; ?>
              <?php if($pek->foto){ ?>
              <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $pek->foto; ?>" alt="" class="img-responsive profile-photo" />
            <?php } ?>
              <h4><?php echo $pek->first_name; ?> <?php echo $pek->last_name; ?></h4>
              <p class="text-muted">Programmer</p>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                <li><a href="<?php echo site_url('ringkasan-profile/'.$pek->id);?>">Summary</a></li>
                <li><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>">Overview</a></li>
                <li><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>">Performance</a></li>
                <li><a href="edit-profile-work-edu.html">Feedback</a></li>
              </ul>
            </div>
          </div>
        </div>
        <?php endforeach; ?>



        <div id="page-contents">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8">
                <div class="chat-room">
              <div  class="row">
                <div class="col-md-5">

                  <ul class="nav nav-tabs contact-list scrollbar-wrapper scrollbar-outer">

                    <?php 
                    $jumlah_goal=count($goal);
                    if($jumlah_goal > 0) { 

                    foreach($goal as $go):?>
                     <li class="active">
                      <a data-toggle="tab"  data-id="<?php echo $go->id_goal; ?>" class="client-link edit_button" >
                        <div class="contact">
                          <div class="msg-preview">
                            <h5><?php echo $go->goal; ?></h5>
                            <p class="text-muted"><?php echo $go->status; ?></p> 
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php endforeach; ?>
                <?php }else{ ?>
                        <center>Tidak ada data!</center>
                <?php } ?>
                  </ul>
                </div>

                <div class="tampildata">

                  <center>
                       Tidak ada data !
                  </center>
                  <!--
                <div class="col-md-7">
                    <h4> <b>View Goal</b> </h4>
                  <table class="table">
                      <thead>
                       
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Goal</th>
                          <td>* Menciptakan type reporting dengan menggunakan Power B</td>
                        </tr>
                        <tr>
                          <th scope="row">Description</th>
                          <td>Jacob</td>
                        </tr>
                        <tr>
                          <th scope="row">Category</th>
                          <td>Larry</td>
                        </tr>
                          <tr>
                          <th scope="row">Status</th>
                          <td>Yellow - Risky, but Achievable</td>
                        </tr>
                        <tr>
                          <th scope="row">Supports</th>
                          <td>Optimization of mobile apps and field services feature (Public)</td>
                        </tr>
                        <tr>
                          <th scope="row">Weight</th>
                          <td>0</td>
                        </tr>
                        <tr>
                          <th scope="row">Due Date</th>
                          <td>(empty)</td>
                        </tr>
                        <tr>
                          <th scope="row">Associated Reviews</th>
                          <td>(empty)</td>
                        </tr>
                      </tbody>
                    </table>

                </div>
                <div class="clearfix"></div>
              </div>
            -->
              </div>
             </div>
            <?php if($jumlah_goal > 0) { ?> 
            <div class="row">
            <button type="button" class="btn btn-warning">Edit</button>
          </div>
        <?php } ?>
      
            </div>     
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <script>
      /*
        function reply_click(clicked_id)
            {
                var id=clicked_id; 

                $('.tampildata').load("http://portal.aartijaya.com/Profile_detail/replay/"+id);
            }
            */

              $(document).on("click", ".edit_button", function () {
        var myId = $(this).data('id');
       
        $.ajax({
            type: 'POST',
            url: 'http://portal.aartijaya.com/Profile_Detail/replay',
            data: { ids: myId},
            success: function(response) {
                $('.tampildata').html(response);
            }
        });
    }); 
    </script>


    
 