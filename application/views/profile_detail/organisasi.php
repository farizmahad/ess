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

							<li><i class="icon ion-ios-information-outline"></i><a href="<?php echo site_url('ringkasan-profile/'.$pek->id);?>">Ringkasan Profile</a></li>
							<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>">Profile Singkat</a></li>
							<li class="active"><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('organisasi/'.$pek->id);?>">Struktur Organisasi</a></li>
							<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>">Kinerja</a></li>
							<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('feedback/'.$pek->id);?>">Saran</a></li>
							<li><i class="icon ion-ios-briefcase-outline"></i><a href="<?php echo site_url('personal-information/'.$pek->id);?>">Informasi Pribadi</a></li>                 
						  
						  </ul>
					</div>
				</div>
            </div>
          </div>
          <?php endforeach; ?>



<?php foreach($detail_pekerjaan as $pek) :?>
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <!--<//?php echo $pek->foto; ?>-->
              <?php if($pek->foto){ ?>
              <img src="<?php echo base_url(); ?>files/foto_user/<?php echo $pek->foto; ?>" alt="" class="img-responsive profile-photo" />
            <?php } ?>
              <h4><?php echo $pek->first_name; ?> <?php echo $pek->last_name; ?></h4>
              <p class="text-muted"><?php echo $pek->nama_jabatan; ?></p>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
				<li><a href="<?php echo site_url('ringkasan-profile/'.$pek->id);?>">Ringkasan Profile</a></li>
				<li><a href="<?php echo site_url('detail-pekerjaan/'.$pek->id);?>">Profile Singkat</a></li>
				<li><a href="<?php echo site_url('organisasi/'.$pek->id);?>">Struktur Organisasi</a></li>
				<li><a href="<?php echo site_url('tujuan-individu/'.$pek->id);?>">Kinerja</a></li>
				<li><a href="<?php echo site_url('feedback/'.$pek->id);?>">Saran</a></li>
				<li><a href="<?php echo site_url('personal-information/'.$pek->id);?>">Informasi Pribadi</a></li>
                <li><a href="edit-profile-work-edu.html">Feedback</a></li>
              </ul>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

		<div id="page-contents">
          <div class="container-fluid">
			  <div class="row justify-content-center">
				<div class="col-lg-3 col-md-4">
				</div>
				<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
					<div class="row">
						<div class="people-nearby">
							<div class="block-title">
							  <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i> Struktur Organisasi Divisi <?php echo $nama_divisi; ?> PT. Aartijaya Bandung </h4>
							  
							  <div class="line"></div>
							</div>

							<?php foreach($users_divisi as $us): ?>
							<div class="nearby-user">
								<div class="row">
								  <div class="col-md-2 col-sm-2">
									<img src="<?php echo base_url(); ?>files/foto_user/<?php echo $us->foto; ?>" alt="user" class="profile-photo-lg" />
								  </div>
								  <div class="col-md-8 col-sm-8">
									<h5><a href="<?php echo site_url('ringkasan-profile/'.$us->id);?>" class="profile-link"><?php echo $us->first_name; ?> <?php echo $us->last_name; ?></a></h5>
									<p><?php echo $us->nama_jabatan; ?></p>
									<p class="text-muted"></p>
								  </div>
								  <div class="col-md-2 col-sm-2">
									<button class="btn btn-success pull-right"><?php echo $us->nama_jabatan; ?></button>
								  </div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
		
            </div>
             
            </div>
            
          </div>
        </div>
      </div>
    </div>


